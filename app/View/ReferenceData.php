<?php

namespace App\View;

use App\Models\AgeCohort;
use App\Models\Condition;
use App\Models\LevelOfCare;
use App\Models\ProgramArea;
use App\Models\ProgramGroup;
use App\Models\PublicHealthFunction;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ReferenceData
{
    public const CacheKey = 'reference-data:v1';

    public function compose(View $view): void
    {
        $view->with(Cache::memo()->remember(self::CacheKey, now()->addHour(), fn (): array => [
            'referenceProgramGroups' => ProgramGroup::with('conditions')->get(),
            'referenceProgramAreas' => ProgramArea::has('conditions')->with('conditions')->get(),
            'referenceConditions' => Condition::sorted()->get(),
            'referenceAgeCohorts' => AgeCohort::all(),
            'referenceLevelsOfCare' => LevelOfCare::all(),
            'referencePublicHealthFunctions' => PublicHealthFunction::sorted()->get(),
        ]));
    }
}
