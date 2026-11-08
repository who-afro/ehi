<?php

namespace App\View;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class InterventionDetails
{
    public function compose(View $view): void
    {
        $interventions = $view->getData()['interventions'];
        if ($interventions instanceof LengthAwarePaginator) {
            $interventions = $interventions->getCollection();
        }

        $interventions->loadMissing(['condition', 'ageCohort']);

        $dimensions = match ($view->name()) {
            'components.details.condition' => ['age_cohort_id', 'level_of_care_id', 'public_health_function_id'],
            'components.details.level-of-care' => ['condition_id', 'age_cohort_id', 'public_health_function_id'],
            'components.details.public-health-function' => ['condition_id', 'age_cohort_id', 'level_of_care_id'],
            'components.details.intervention' => ['condition_id', 'age_cohort_id', 'level_of_care_id', 'public_health_function_id'],
            default => ['condition_id', 'level_of_care_id', 'public_health_function_id'],
        };

        $view->with('interventionGroups', $interventions->groupBy($dimensions));
        $view->with('conditionLabels', $interventions->pluck('condition')->filter()->keyBy('id'));
        $view->with('ageCohortLabels', $interventions->pluck('ageCohort')->filter()->keyBy('id'));
    }
}
