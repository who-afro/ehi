<?php

namespace App\Http\Controllers;

use App\Models\EssentialPackage;
use App\Models\Intervention;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenSpout\Common\Entity\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Spatie\SimpleExcel\SimpleExcelWriter;
use ZanySoft\Zip\Zip;

class DownloadEssentialsPackage extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke(EssentialPackage $package)
    {
        Log::info("Processing package export for ".$package->uuid);
        $folder_name = Str::kebab($package->uuid).now()->toDateString().'-'.now()->secondsSinceMidnight();
        // create the zip folder
        $folder_path = Storage::disk('exports')->path('').$folder_name;
        $zip_file_name = $folder_name.".zip";
        $zip_file_name_with_path = Storage::disk('exports')->path('').$zip_file_name;
        $zip_file_url = Storage::disk('exports')->url($zip_file_name);
        File::makeDirectory($folder_path);

        $age_cohort_ids = $package->age_cohorts;
        $levels_of_care_ids = $package->levels_of_care;
        $condition_ids = $package->conditions;
        $public_health_function_ids = $package->public_health_functions;

        $interventions = Intervention::with('condition', 'ageCohort', 'levelOfCare', 'publicHealthFunction')
            ->when($age_cohort_ids,
                fn ($query, $age_cohorts) => $query->orWhereHas('ageCohort',
                    function ($query) use ($age_cohort_ids) {
                        $query->whereIn('age_cohort_id', $age_cohort_ids);
                    }))
            ->when($condition_ids,
                fn ($query, $conditions) => $query->orWhereHas('condition',
                    function ($query) use ($condition_ids) {
                        $query->whereIn('condition_id', $condition_ids);
                    }))
            ->when($levels_of_care_ids, fn ($query,  $levels_of_care) => $query->orWhereHas('levelOfCare',
                function ($query) use ($levels_of_care_ids) {
                    $query->whereIn('level_of_care_id', $levels_of_care_ids);
                }))
            ->when($public_health_function_ids,
                fn ($query, $public_health_functions) => $query->orWhereHas('publicHealthFunction',
                    function ($query) use ($public_health_function_ids) {
                        $query->whereIn('public_health_function_id', $public_health_function_ids);
                    }))
            ->get()
            ->map(function ($item) {
                // rebuild the data export to match the expectations for the particular page
                $row['Condition'] = $item->condition->name;
                $row['Age Cohort'] = $item->ageCohort->name;
                $row['Public Health Function'] = $item->publicHealthFunction->name;
                $row['Level Of Care'] = $item->levelOfCare->name;
                $row[$item->publicHealthFunction->name] = trim(Str::replace(PHP_EOL.PHP_EOL, PHP_EOL,
                                                Str::replace('<br/>', PHP_EOL,
                                                    Str::replace('*', PHP_EOL."*", $item->details))));
                # $row['Published Evidence'] = $item->confirmed_with_evidence? 'Yes' : '';

                return $row;
            })
        ->groupBy(['Age Cohort', 'Condition','Level Of Care'], preserveKeys:true);

        $zip_file = new Zip();
        $zip_file->create($zip_file_name_with_path);

        // now create the files
        $interventions->each(function ($conditions, $age_cohort) use ($folder_path) {
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

                foreach ($condition_interventions as $level_of_care => $interventions_for_level) {
                    foreach ($interventions_for_level as $intervention) {
                        $public_health_function = $intervention['Public Health Function'];
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
    }
}
