<?php

namespace App\Providers;

use App\Models\AgeCohort;
use App\Models\Condition;
use App\Models\LevelOfCare;
use App\Models\ProgramArea;
use App\Models\ProgramGroup;
use App\Models\PublicHealthFunction;
use App\Models\ReferenceDataObserver;
use App\View\InterventionDetails;
use App\View\ReferenceData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        foreach ([AgeCohort::class, Condition::class, LevelOfCare::class, ProgramArea::class, ProgramGroup::class, PublicHealthFunction::class] as $model) {
            $model::observe(ReferenceDataObserver::class);
        }

        View::composer([
            'components.nav', 'components.filters.*', 'components.details.*',
            'age-cohort-overview', 'condition-overview', 'level-of-care-overview',
            'public-health-function-overview', 'program-area-overview', 'livewire.essential-package',
        ], ReferenceData::class);
        View::composer('components.details.*', InterventionDetails::class);

        URL::forceScheme('https');
        Schema::defaultStringLength(191);

        // searching in query builders
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', '%'.$string.'%') : $this;
        });
    }
}
