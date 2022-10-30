<?php

namespace App\Http\Controllers;

use App\Exports\InterventionsExport;
use App\Models\EssentialPackage;
use App\Models\Intervention;
use Str;

class DownloadEssentialsPackage extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke(EssentialPackage $package)
    {

        $file_name = Str::kebab($package->title).now()->toDateString().'-'.now()->secondsSinceMidnight().'.xlsx';
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
                $row['Program Area'] = $item->condition->programArea->name;
                $row['Condition'] = $item->condition->name;
                $row['Age Cohort'] = $item->ageCohort->name;
                $row['Public Health Function'] = $item->publicHealthFunction->name;
                $row['Level Of Care'] = $item->levelOfCare->name;
                $row['Intervention'] = trim(Str::replace(PHP_EOL.PHP_EOL, PHP_EOL,
                                                Str::replace('<br/>', PHP_EOL,
                                                    Str::replace('*', PHP_EOL."*", $item->details))));
                $row['Confirmed with Evidence'] = $item->confirmed_with_evidence? 'Yes' : 'No';

                return $row;
            });;

        return(new InterventionsExport($interventions))->download($file_name);
    }
}
