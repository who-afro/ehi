<?php

namespace App\Http\Livewire;

use App\Models\InterventionDetails;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Interventions extends Component
{
    use WithPagination;

    public $filters = [
        'age_cohort_id' => '',
        'condition_id' => '',
        'level_of_care_id' => '',
        'public_health_function_id' => '',
        'intervention_category_id' => '',
        'program_area_id' => '',
        'search' => null,
        'applyFilter' => '',
        'number_of_items_per_page' => 10
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
        return InterventionDetails::with('intervention', 'interventionCategory')
            ->when($this->filters['intervention_category_id'], fn($query, $intervention_category_id) => $query->whereIn('intervention_category_id', $intervention_category_id))
            ->when($this->filters['age_cohort_id'], fn($query, $age_cohort_id) => $query->whereHas('intervention.ageCohort',
                function($query) use ($age_cohort_id) {
                    $query->where('age_cohort_id', $age_cohort_id);
                }))
            ->when($this->filters['condition_id'], fn($query, $condition_id) => $query->whereHas('intervention.condition',
                function($query) use ($condition_id) {
                    $query->where('condition_id', $condition_id);
                }))
            ->when($this->filters['level_of_care_id'], fn($query, $level_of_care_id) => $query->whereHas('intervention.levelOfCare',
                function($query) use ($level_of_care_id) {
                    $query->where('level_of_care_id', $level_of_care_id);
                }))
            ->when($this->filters['public_health_function_id'],
                fn($query, $public_health_function_id) => $query->whereHas('intervention.publicHealthFunction',
                    function($query) use ($public_health_function_id) {
                        $query->where('public_health_function_id', $public_health_function_id);
            }))
            ->when($this->filters['program_area_id'],
                fn($query, $program_area_id) => $query->whereHas('intervention.condition.programAreas',
                    function($query) use ($program_area_id) {
                        $query->whereIn('program_area_id', $program_area_id);
                    }))
            ->when($this->filters['search'], fn($query, $search) => $query->where('details', 'like', '%' . $search . '%'))
            ->paginate($this->filters['number_of_items_per_page']);
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
        return view($this->getView(),
            [
                'interventions' => $interventions
            ]);
    }

    protected function getView() {
        return 'livewire.interventions';
    }
}
