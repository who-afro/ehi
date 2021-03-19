<?php


namespace App\Http\Livewire;


class AgeCohortInterventions extends Interventions
{
    public function mount($age_cohort_id)
    {
        $this->filters['age_cohort_id'] = array($age_cohort_id);
    }
}
