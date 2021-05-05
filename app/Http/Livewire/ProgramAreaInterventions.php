<?php


namespace App\Http\Livewire;

use App\Models\ProgramArea;

class ProgramAreaInterventions extends Interventions
{
    public $programArea;

    public function mount($program_area_id)
    {
        $this->filters['program_area_id'] = array($program_area_id);
        $this->programArea = ProgramArea::find($program_area_id);

    }

    protected function getView() {
        return 'livewire.program-area-interventions';
    }
}
