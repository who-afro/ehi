<?php


namespace App\Http\Livewire;


class LevelOfCareInterventions extends Interventions
{
    public function mount($intervention_level_id)
    {
        $this->filters['intervention_level_id'] = $intervention_level_id;
    }
}
