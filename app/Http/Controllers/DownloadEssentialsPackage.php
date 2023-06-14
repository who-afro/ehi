<?php

namespace App\Http\Controllers;

use App\Models\EssentialPackage;
use App\Models\Intervention;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

        $folder_name = Str::kebab($package->uuid).now()->toDateString().'-'.now()->secondsSinceMidnight();
        // create the zip folder
        $folder_path = Storage::disk('exports')->path('').$folder_name;
        $zip_file_name = $folder_name.".zip";
        $zip_file_name_with_path = Storage::disk('exports')->path('').$zip_file_name;
        $zip_file_url = Storage::disk('exports')->url($zip_file_name);
        File::makeDirectory($folder_path);

        $age_cohorts = $package->age_cohorts;
        $levels_of_care = $package->levels_of_care;
        $conditions = $package->conditions;
        $public_health_functions = $package->public_health_functions;

        $interventions = Intervention::with('condition', 'ageCohort', 'levelOfCare', 'publicHealthFunction')
            ->when($age_cohorts,
                fn ($query, $age_cohorts) => $query->orWhereHas('ageCohort',
                    function ($query) use ($age_cohorts) {
                        $query->whereIn('age_cohort_id', $age_cohorts);
                    }))
            ->when($conditions,
                fn ($query, $conditions) => $query->orWhereHas('condition',
                    function ($query) use ($conditions) {
                        $query->whereIn('condition_id', $conditions);
                    }))
            ->when($levels_of_care, fn ($query,  $levels_of_care) => $query->orWhereHas('levelOfCare',
                function ($query) use ($levels_of_care) {
                    $query->whereIn('level_of_care_id', $levels_of_care);
                }))
            ->when($public_health_functions,
                fn ($query, $public_health_functions) => $query->orWhereHas('publicHealthFunction',
                    function ($query) use ($public_health_functions) {
                        $query->whereIn('public_health_function_id', $public_health_functions);
                    }))
            ->get()
            ->map(function ($item) {
                // rebuild the data export to match the expectations for the particular page
                $row['Condition'] = $item->condition->name;
                $row['Age Cohort'] = $item->ageCohort->name;
                $row['Public Health Function'] = $item->publicHealthFunction->name;
                $row['Level Of Care'] = $item->levelOfCare->name;
                $row['Intervention'] = trim(Str::replace(PHP_EOL.PHP_EOL, PHP_EOL,
                                                Str::replace('<br/>', PHP_EOL,
                                                    Str::replace('*', PHP_EOL."*", $item->details))));
                $row['Published Evidence'] = $item->confirmed_with_evidence? 'Yes' : '';

                return $row;
            })
        ->groupBy(['Age Cohort', 'Condition'])
        ->all();

        # ray($interventions);
        $zip_file = new Zip();

        $zip_file->create($zip_file_name_with_path);

        // now create the folder
        foreach ($interventions as $age_cohort => $data) {
            // now write the age-cohort data to each file
            $excel_file_name = $folder_path.DIRECTORY_SEPARATOR.$age_cohort.".xlsx";
            ray("creating export file at ".$excel_file_name);
            $writer = SimpleExcelWriter::create($excel_file_name);
            foreach ($data as $condition => $values) {
                // remove special characters from the sheet name and limit it to 30 characters
                $sheet_name = Str::limit(preg_replace('/[^A-Za-z0-9. -]/', '', $condition), 30, '');
                $writer->addNewSheetAndMakeItCurrent($sheet_name);
                // Prepare the array data for formatting
                $cleaned_values = $values->each(function ($item) {
                    Arr::forget($item, 'Condition');
                    Arr::forget($item, 'Age Cohort');
                });

                ray($values->toArray());
                $writer->addRows($values->toArray());

            }
        }

        // Zip the generated files
        $zip_file->add($folder_path);

        # dd();

        return redirect($zip_file_url);
    }
}
