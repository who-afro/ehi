<?php

namespace App\Http\Livewire;

use App\Models\Intervention;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Interventions extends Component
{
    use WithPagination;

    public $filters = [
        'age_cohort_id' => '',
        'condition_id' => '',
        'intervention_level_id' => '',
        'public_health_function_id' => '',
        'program_area_id' => '',
        'search' => null,
        'applyFilter' => ''
    ];

    /**
     * Return to the first page results each time the filters are updated, to prevent no results being displayed
     * just because they are not as many as the page being shown
     */
    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function applyFilter() {
        $this->filters['applyFilter'] = 'show';
        $this->render();
    }


    public function getInterventionList(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Intervention::with('condition:id,name', 'ageCohort:id,name', 'interventionLevel:id,name', 'publicHealthFunction:id,name')
            ->when($this->filters['age_cohort_id'], fn($query, $age_cohort_id) => $query->where('age_cohort_id', $age_cohort_id))
            ->when($this->filters['condition_id'], fn($query, $condition_id) => $query->where('condition_id', $condition_id))
            ->when($this->filters['intervention_level_id'], fn($query, $intervention_level_id) => $query->where('intervention_level_id', $intervention_level_id))
            ->when($this->filters['public_health_function_id'], fn($query, $public_health_function_id) => $query->where('public_health_function_id', $public_health_function_id))
            ->when($this->filters['search'], fn($query, $search) => $query->where('details', 'like', '%' . $search . '%'))
            ->paginate(10);
    }


    public function render()
    {
        /**
         * TODO: Fix this hack for showing no rows at the beginning
         */
        $interventions =  new LengthAwarePaginator(null, 0, 10);
        if ($this->filters['applyFilter'] == 'show') {
            $interventions =  $this->getInterventionList();
        }
        return view('livewire.interventions',
            [
                'interventions' => $interventions
            ]);
    }
}
