<?php


namespace App\Http\Livewire;


use App\Models\Intervention;
use Livewire\Component;

class InterventionsListComponent extends Component
{

    public $objects = [];

    public $paginator = [];

    public $page = 1;

    public $items_per_page = 15;

    public $loading_message = "";

    public $listeners = [
        "load_list" => "loadList"
    ];

    public $filter = [
        "age_cohort_id" => "",
        "condition_id" => "",
        "intervention_list_id" => "",
        "public_health_function_id" => "",
    ];

    protected $updatesQueryString = ['page'];

    public function mount(){
        $this->loadList();
    }

    public function loadList(){
        $this->loading_message = "Loading Interventions...";

        $query = [];

        if(!empty($this->filter["age_cohort_id"])){
            $query["age_cohort_id"] = $this->filter["age_cohort_id"];
        }

        if(!empty($this->filter["condition_id"])){
            $query["condition_id"] = $this->filter["condition_id"];
        }

        if(!empty($this->filter["intervention_list_id"])){
            $query["intervention_list_id"] = $this->filter["intervention_list_id"];
        }

        if(!empty($this->filter["public_health_function_id"])){
            $query["public_health_function_id"] = $this->filter["public_health_function_id"];
        }

        $objects = Intervention::with('condition:id,name','ageCohort:id,name')->where($query);

        // Paginating
        $objects = $objects->paginate($this->items_per_page);


        $this->paginator = $objects->toArray();
        $this->objects = $objects->items();

    }

    // Pagination Method
    public function applyPagination($action, $value, $options=[]){

        if( $action == "previous_page" && $this->page > 1){
            $this->page-=1;
        }

        if( $action == "next_page" ){
            $this->page+=1;
        }

        if( $action == "page" ){
            $this->page=$value;
        }

        $this->loadList();
    }

    public function render()
    {
        return view('livewire.show-interventions');
    }
}
