<?php


namespace App\Http\Livewire;


class LevelOfCareInterventions extends Interventions
{
    public function mount($level_of_care_id)
    {
        $this->filters['level_of_care_id'] = array($level_of_care_id);
    }
}
