<?php


namespace App\Http\Livewire;


class ProgramAreaInterventions extends Interventions
{
    public function mount($program_area_id)
    {
        $this->filters['program_area_id'] = array($program_area_id);
    }
}
