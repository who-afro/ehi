<?php

namespace App\Http\Livewire;

use App\Models\EssentialPackage;
use Livewire\Component;
use Spatie\ValidationRules\Rules\Delimited;

class EssentialPackageComponent extends Component
{
    public array $conditions;
    public array $levels_of_care;
    public array $public_health_functions;
    public array $age_cohorts;
    public string $title;
    public string $description;
    public string $notification_emails;
    public EssentialPackage $package;
    public $selectAllConditions = false;

    protected $messages = [
        'title.required' => "The title of the package is required",
    ];

    public function mount() {
        $this->conditions = array();
        $this->levels_of_care = array();
        $this->public_health_functions = array();
        $this->age_cohorts = array();
        $this->title = '';
        $this->description = '';
        $this->notification_emails = '';
    }

    public function rules() {
        return [
            'title' => 'required',
            'description' => 'nullable',
            'conditions' => 'nullable',
            'levels_of_care' => 'nullable',
            'public_health_functions' => 'nullable',
            'age_cohorts' => 'nullable',
            'notification_emails' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->package = EssentialPackage::create($this->validate());
        // TODO: Email the link to the essential package to the provided addresses
        $this->redirectRoute('show-essential-package', ['package' => $this->package->uuid]);
    }

    public function render()
    {
        return view('livewire.essential-package');
    }
}
