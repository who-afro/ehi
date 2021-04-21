<?php


namespace App\Http\Livewire;

use App\Models\Condition;
use App\Models\ProgramArea;

class ConditionInterventions extends Interventions
{
    public $condition;
    public $program_area;

    public function mount($program_area_id, $condition_id)
    {
        $this->filters['program_area_id'] = array($program_area_id);
        $this->filters['condition_id'] = array($condition_id);
        $this->condition = Condition::find($condition_id);
        $this->program_area = ProgramArea::find($program_area_id);
    }

    protected function getView() {
        return 'livewire.condition-interventions';
    }
}
