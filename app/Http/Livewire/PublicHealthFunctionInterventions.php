<?php


namespace App\Http\Livewire;


use App\Models\PublicHealthFunction;

class PublicHealthFunctionInterventions extends Interventions
{
    public $publicHealthFunction;

    public function mount($public_health_function_id)
    {
        $this->filters['public_health_function_id'] = array($public_health_function_id);
        $this->publicHealthFunction = PublicHealthFunction::find($public_health_function_id);
    }

    protected function getView() {
        return 'livewire.public-health-function-interventions';
    }
}
