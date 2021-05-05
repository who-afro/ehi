<?php


namespace App\Http\Livewire;

use App\Models\ServiceArea;

class ServiceAreaInterventions extends Interventions
{
    public $serviceArea;
    public $parent;

    public function mount($service_area_id)
    {
        $this->filters['service_area_id'] = array($service_area_id);
        if (isset(request()->parent_id)) {
            $this->parent = ServiceArea::find(request()->parent_id);
        }
        $this->serviceArea = ServiceArea::find($service_area_id);
    }

    protected function getView() {
        return 'livewire.service-area-interventions';
    }
}
