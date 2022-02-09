<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EssentialPackage extends Component
{
    public array $package = [
        'conditions' => [],
        'levels_of_care' => [],
        'public_health_functions' => [],
        'age_cohorts' => [],
        'title' => '',
        'description' => '',
        'notification_emails' => '',
    ];

    public function savePackage()
    {
        // do nothing
    }

    public function exportPDF()
    {
        // do nothing
    }

    public function exportExcel()
    {
        // do nothing
    }

    public function render()
    {
        return view('livewire.essential-package');
    }
}
