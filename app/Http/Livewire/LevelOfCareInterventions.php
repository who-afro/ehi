<?php

namespace App\Http\Livewire;

use App\Models\LevelOfCare;

class LevelOfCareInterventions extends Interventions
{
    public $levelOfCare;

    public function mount($level_of_care_id)
    {
        $this->filters['level_of_care_id'] = [$level_of_care_id];
        $this->levelOfCare = LevelOfCare::find($level_of_care_id);
    }

    protected function getView()
    {
        return 'livewire.level-of-care-interventions';
    }
}
