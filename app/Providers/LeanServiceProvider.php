<?php

namespace App\Providers;

use App\Lean\Pages;
use App\Lean\Resources\AgeCohortResource;
use App\Lean\Resources\InterventionLevelResource;
use App\Lean\Resources\PublicHealthFunctionResource;
use App\Models\Intervention;
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
        // Lean::addResource('intervention', InterventionResource::class);
        Lean::addResource('intervention-level', InterventionLevelResource::class);
        Lean::addResource('public-health-function', PublicHealthFunctionResource::class);
        // Lean::addResource('products', Resources\ProductResource::class);
        // Lean::addResource('tags', Resources\TagResource::class);
        // Lean::addPage('dashboard', Pages\Dashboard::class);
    }
}
