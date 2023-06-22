<?php

namespace App\Http\Livewire;

use App\Exports\InterventionsExport;
use App\Models\Condition;
use App\Models\Intervention;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use OpenSpout\Common\Entity\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Spatie\SimpleExcel\SimpleExcelWriter;
use ZanySoft\Zip\Zip;

class Interventions extends Component
{
    use WithPagination;

    public $filters = [
        'condition_id' => [],
        'age_cohort_id' => [],
        'public_health_function_id' => [],
        'level_of_care_id' => [],
        'program_area_id' => [],
        'search' => null,
        'applyFilter' => '',
        'number_of_interventions_per_page' => 1000,
        'number_of_conditions_per_page' => 1,
        'confirmed_with_evidence' => ''
    ];

    /**
     * Return to the first page results each time the filters are updated, to prevent no results being displayed
     * just because they are not as many as the page being shown
     */
    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function applyFilter()
    {
        $this->filters['applyFilter'] = 'show';
        $this->render();
    }

    public function getInterventionListQuery()
    {
        return Intervention::with('condition', 'ageCohort', 'levelOfCare', 'publicHealthFunction')
            ->when($this->filters['age_cohort_id'],
                fn ($query, $age_cohort_id) => $query->whereHas('ageCohort',
                    function ($query) use ($age_cohort_id) {
                        $query->whereIn('age_cohort_id', $age_cohort_id);
                    }))
            ->when($this->filters['condition_id'],
                fn ($query, $condition_id) => $query->whereHas('condition',
                    function ($query) use ($condition_id) {
                        $query->whereIn('condition_id', $condition_id);
                    }))
            ->when($this->filters['level_of_care_id'], fn ($query, $level_of_care_id) => $query->whereHas('levelOfCare',
                function ($query) use ($level_of_care_id) {
                    $query->whereIn('level_of_care_id', $level_of_care_id);
                }))
            ->when($this->filters['public_health_function_id'],
                fn ($query, $public_health_function_id) => $query->whereHas('publicHealthFunction',
                    function ($query) use ($public_health_function_id) {
                        $query->whereIn('public_health_function_id', $public_health_function_id);
                    }))
            ->when($this->filters['search'], fn ($query, $search) => $query->where('details', 'like', '%'.$search.'%'))
            ->when($this->filters['confirmed_with_evidence'], fn ($query, $confirmed_with_evidence) => $query->where('confirmed_with_evidence', $confirmed_with_evidence));
    }

    public function getConditionListQuery()
    {
        return Condition::with('interventions', 'interventions.ageCohort', 'interventions.levelOfCare', 'interventions.publicHealthFunction')
            ->when($this->filters['age_cohort_id'],
                fn ($query, $age_cohort_id) => $query->whereHas('interventions.ageCohort',
                    function ($query) use ($age_cohort_id) {
                        $query->whereIn('interventions.age_cohort_id', $age_cohort_id);
                    }))
            ->when($this->filters['condition_id'],
                fn ($query, $condition_id) => $query->whereHas('interventions.condition',
                    function ($query) use ($condition_id) {
                        $query->whereIn('condition_id', $condition_id);
                    }))
            ->when($this->filters['level_of_care_id'], fn ($query, $level_of_care_id) => $query->whereHas('interventions.levelOfCare',
                function ($query) use ($level_of_care_id) {
                    $query->whereIn('level_of_care_id', $level_of_care_id);
                }))
            ->when($this->filters['public_health_function_id'],
                fn ($query, $public_health_function_id) => $query->whereHas('interventions.publicHealthFunction',
                    function ($query) use ($public_health_function_id) {
                        $query->whereIn('public_health_function_id', $public_health_function_id);
                    }))
            ->when($this->filters['search'], fn ($query, $search) => $query->where('interventions.details', 'like', '%'.$search.'%'))
            ->when($this->filters['confirmed_with_evidence'], fn ($query, $confirmed_with_evidence) => $query->where('interventions.confirmed_with_evidence', $confirmed_with_evidence));
    }

    public function getInterventionList(): LengthAwarePaginator
    {
        return $this->getInterventionListQuery()->paginate($this->filters['number_of_interventions_per_page']);
    }

    public function getConditionList(): LengthAwarePaginator
    {
        return $this->getConditionListQuery()->paginate($this->filters['number_of_conditions_per_page']);
    }

    public function render()
    {
        if (request()->has('search')) {
            $this->filters['search'] = request()->input('search');
        }

        return view($this->getView(),
            [
                'interventions' => $this->getInterventionList(),
                'filters' => $this->filters,
            ]);
    }

    public function exportExcel()
    {
        Log::info("Processing data export");
        $folder_name = $this->getExcelExportFolderName();
        // create the zip folder
        $folder_path = Storage::disk('data-exports')->path('').$folder_name;
        $zip_file_name = $folder_name.".zip";
        $zip_file_name_with_path = Storage::disk('data-exports')->path('').$zip_file_name;
        $zip_file_url = Storage::disk('data-exports')->url($zip_file_name);
        File::makeDirectory($folder_path);

        $zip_file = new Zip();
        $zip_file->create($zip_file_name_with_path);

        // now create the files
        $this->getExportData()->each(function ($conditions, $age_cohort) use ($folder_path) {
            $excel_file_name = $folder_path.DIRECTORY_SEPARATOR.$age_cohort.".xlsx";
            $writer = SimpleExcelWriter::create(
                file: $excel_file_name,
                configureWriter: function($writer){
                    $options = $writer->getOptions();
                    $options->DEFAULT_COLUMN_WIDTH=75;
                    $options->setColumnWidth(50,1);
                });
            Log::debug("Creating Excel file for ".$age_cohort);
            $conditions->each(function($condition_interventions, $condition) use ($writer) {
                // create a sheet for each condition
                $sheet_name = Str::limit(preg_replace('/[^A-Za-z0-9. -]/', '', $condition), 30, '');
                $writer->addNewSheetAndMakeItCurrent($sheet_name);
                Log::debug("Adding sheet for ".$condition);

                // styling for the rows and header
                $row_style = (new Style())
                    ->setShouldWrapText()
                    ->setCellVerticalAlignment(Alignment::VERTICAL_TOP)
                    ->setCellAlignment(Alignment::HORIZONTAL_LEFT)
                    ->setFontSize(16);

                $header_style = (new Style())
                    ->setShouldWrapText()
                    ->setCellVerticalAlignment(Alignment::VERTICAL_TOP)
                    ->setCellAlignment(Alignment::HORIZONTAL_LEFT)
                    ->setFontSize(16)
                    ->setFontBold();
                $writer->setHeaderStyle($header_style);

                // transposed data array for the interventions data
                $transposed_intervention_list = array();

                foreach ($condition_interventions as $interventions_for_level) {

                    foreach ($interventions_for_level as $intervention) {
                        $public_health_function = $intervention['Public Health Function'];
                        $level_of_care = $intervention['Level of Care'];
                        // ensure level of care key exists
                        if(!array_key_exists($level_of_care, $transposed_intervention_list)) {
                            $transposed_intervention_list[$level_of_care] = array('Level of Care' => $level_of_care);
                        }
                        // ensure the public health function key exists
                        if(!array_key_exists($public_health_function, $transposed_intervention_list[$level_of_care])) {
                            // add an empty value for the key
                            $transposed_intervention_list[$level_of_care][$public_health_function] = '';
                        }
                        // combine the contents for level of care which may be duplicated
                        $transposed_intervention_list[$level_of_care][$public_health_function] = $transposed_intervention_list[$level_of_care][$public_health_function].$intervention[$public_health_function];
                    }
                }
                $writer->addRows($transposed_intervention_list, $row_style);
            });
            Log::debug("Excel file for ".$age_cohort." completed");
        });

        // Zip the generated files
        Log::debug("Creating zip file for files in folder at ".$folder_path);
        $zip_file->add($folder_path);
        Log::debug("Zip file created at ".$zip_file_name_with_path);

        return redirect($zip_file_url);
        //
        //return(new InterventionsExport($this->getExportData()))->download($this->getExcelExportFileName());
    }

    public function exportPDF()
    {
        return(new InterventionsExport($this->getExportData()))->download($this->getPDFExportFileName(), Excel::DOMPDF);
    }

    public function getExcelExportFolderName()
    {
        return 'interventions-'.now()->toDateString().'-'.now()->secondsSinceMidnight();
    }

    public function getPDFExportFileName()
    {
        return 'interventions-'.now()->toDateString().'-'.now()->secondsSinceMidnight().'.pdf';
    }

    public function getExportData()
    {
        return $this->getInterventionListQuery()->get()
            ->map(function ($item) {
                // rebuild the data export to match the expectations for the particular page
                $row['Condition'] = $item->condition->name;
                $row['Age Cohort'] = $item->ageCohort->name;
                $row['Public Health Function'] = $item->publicHealthFunction->name;
                $row['Level of Care'] = $item->levelOfCare->name;
                $row[$item->publicHealthFunction->name] = trim(Str::replace(PHP_EOL.PHP_EOL, PHP_EOL,
                    Str::replace('<br/>', PHP_EOL,
                        Str::replace('*', PHP_EOL."*", $item->details))));

                return $row;
            })->groupBy(['Age Cohort', 'Condition','Level Of Care'], preserveKeys:true);
    }

    public function deleteIntervention($intervention_id)
    {
        Intervention::destroy($intervention_id);
    }

    protected function getView()
    {
        return 'livewire.interventions';
    }
}
