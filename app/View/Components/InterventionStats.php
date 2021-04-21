<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class InterventionStats extends Component
{

    /**
     * The count of available interventions
     * @var integer
     */
    public $interventions;
    /**
     * The count of available conditions
     * @var integer
     */
    public $conditions;
    public $intervention_categories;
    public $program_areas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->interventions = DB::table('intervention_intervention_category')->count();
        $this->conditions = DB::table('conditions')->count();
        $this->program_areas = DB::table('program_areas')->count();
        $this->intervention_categories = DB::table('intervention_categories')->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.intervention-stats');
    }
}
