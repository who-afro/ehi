<?php

namespace App\Http\Livewire;

use App\Exports\InterventionsExport;
use App\Models\InterventionServiceArea;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;

class Interventions extends Component
{
    use WithPagination;

    public $filters = [
        'age_cohort_id' => [],
        'condition_id' => [],
        'level_of_care_id' => [],
        'public_health_function_id' => [],
        'service_area_id' => [],
        'program_area_id' => [],
        'search' => null,
        'applyFilter' => '',
        'number_of_items_per_page' => 10
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

    public function applyFilter() {
        $this->filters['applyFilter'] = 'show';
        $this->render();
    }


    public function getInterventionListQuery()
    {
        return InterventionServiceArea::with('intervention', 'serviceArea')
            ->when($this->filters['service_area_id'], fn($query, $service_area_id) => $query->whereIn('service_area_id', $service_area_id))
            ->when($this->filters['age_cohort_id'], fn($query, $age_cohort_id) => $query->whereHas('intervention.ageCohort',
                function($query) use ($age_cohort_id) {
                    $query->whereIn('age_cohort_id', $age_cohort_id);
                }))
            ->when($this->filters['condition_id'], fn($query, $condition_id) => $query->whereHas('intervention.condition',
                function($query) use ($condition_id) {
                    $query->whereIn('condition_id', $condition_id);
                }))
            ->when($this->filters['level_of_care_id'], fn($query, $level_of_care_id) => $query->whereHas('intervention.levelOfCare',
                function($query) use ($level_of_care_id) {
                    $query->whereIn('level_of_care_id', $level_of_care_id);
                }))
            ->when($this->filters['public_health_function_id'],
                fn($query, $public_health_function_id) => $query->whereHas('intervention.publicHealthFunction',
                    function($query) use ($public_health_function_id) {
                        $query->whereIn('public_health_function_id', $public_health_function_id);
                    }))
            ->when($this->filters['program_area_id'],
                fn($query, $program_area_id) => $query->whereHas('intervention.condition.programAreas',
                    function($query) use ($program_area_id) {
                        $query->whereIn('program_area_id', $program_area_id);
                    }))
            ->when($this->filters['search'], fn($query, $search) => $query->where('details', 'like', '%' . $search . '%'));
    }
    public function getInterventionList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->getInterventionListQuery()->paginate($this->filters['number_of_items_per_page']);
    }


    public function render()
    {
        return view($this->getView(),
            [
                'interventions' => $this->getInterventionList()
            ]);
    }

    public function exportExcel()
    {
        return(new InterventionsExport($this->getExportData()))->download( $this->getExcelExportFileName());
    }

    public function exportPDF()
    {
        return(new InterventionsExport($this->getExportData()))->download( $this->getPDFExportFileName(), Excel::DOMPDF);
    }

    public function getExcelExportFileName() {
        return 'interventions-'.now()->toDateString().'-'.now()->secondsSinceMidnight().'.xlsx';
    }

    public function getPDFExportFileName() {
        return 'interventions-'.now()->toDateString().'-'.now()->secondsSinceMidnight().'.pdf';
    }

    public function getExportData() {
        return $this->getInterventionListQuery()->get()
            ->map(function($item) {
                // rebuild the data export to match the expectations for the particular page
                $row['Program Area'] = $item->intervention->condition->programAreas->pluck('name')->implode(', ');
                $row['Condition'] = $item->intervention->condition->name;
                $row['Age Cohort'] = $item->intervention->ageCohort->name;
                $row['Public Health Function'] = $item->intervention->publicHealthFunction->name;
                $row['Service Area'] = $item->serviceArea->name;
                $row['Intervention'] = $item->details;

                return $row;
        });
    }

    protected function getView() {
        return 'livewire.interventions';
    }
}
