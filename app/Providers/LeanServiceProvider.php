<?php

namespace App\Providers;

use App\Lean\Resources\AgeCohortResource;
use App\Lean\Resources\ConditionResource;
use App\Lean\Resources\InterventionGroupResource;
use App\Lean\Resources\InterventionLevelResource;
use App\Lean\Resources\InterventionResource;
use App\Lean\Resources\ProgramAreaResource;
use App\Lean\Resources\PublicHealthFunctionResource;
use Illuminate\Support\ServiceProvider;
use Lean\Lean;
use Lean\Livewire\Pages\Welcome;

class LeanServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        Lean::addPage('home', Welcome::class);

        Lean::addResource('age-cohort', AgeCohortResource::class);
        Lean::addResource('condition', ConditionResource::class);
        Lean::addResource('intervention-level', InterventionLevelResource::class);
        Lean::addResource('public-health-function', PublicHealthFunctionResource::class);

        Lean::addResource('intervention', InterventionResource::class);
        Lean::addResource('intervention-group', InterventionGroupResource::class);
        Lean::addResource('program-area', ProgramAreaResource::class);
    }
}
