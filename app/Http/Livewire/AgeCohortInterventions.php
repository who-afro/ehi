<?php

namespace App\Http\Livewire;

use App\Models\AgeCohort;

class AgeCohortInterventions extends Interventions
{
    public $ageCohort;

    public function mount($age_cohort_id)
    {
        $this->filters['age_cohort_id'] = [$age_cohort_id];
        $this->ageCohort = AgeCohort::find($age_cohort_id);
    }

    protected function getView()
    {
        return 'livewire.age-cohort-interventions';
    }
}
