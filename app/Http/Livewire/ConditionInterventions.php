<?php


namespace App\Http\Livewire;

use App\Models\Condition;
use App\Models\ProgramArea;

class ConditionInterventions extends Interventions
{
    public $condition;

    public function mount($condition_id)
    {
        $this->filters['condition_id'] = array($condition_id);
        $this->condition = Condition::find($condition_id);
    }

    protected function getView() {
        return 'livewire.condition-interventions';
    }
}
