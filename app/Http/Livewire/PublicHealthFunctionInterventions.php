<?php


namespace App\Http\Livewire;


class PublicHealthFunctionInterventions extends Interventions
{
    public function mount($public_health_function_id)
    {
        $this->filters['public_health_function_id'] = array($public_health_function_id);
    }
}
