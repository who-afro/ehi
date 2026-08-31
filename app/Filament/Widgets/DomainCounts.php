<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Conditions\ConditionResource;
use App\Filament\Resources\Interventions\InterventionResource;
use App\Filament\Resources\ProgramAreas\ProgramAreaResource;
use App\Filament\Resources\ProgramGroups\ProgramGroupResource;
use App\Models\Condition;
use App\Models\Intervention;
use App\Models\ProgramArea;
use App\Models\ProgramGroup;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DomainCounts extends StatsOverviewWidget
{
    /** @return array<int, Stat> */
    protected function getStats(): array
    {
        return [
            Stat::make('Conditions', Condition::count())
                ->url(ConditionResource::getUrl()),
            Stat::make('Interventions', Intervention::count())
                ->url(InterventionResource::getUrl()),
            Stat::make('Program areas', ProgramArea::count())
                ->url(ProgramAreaResource::getUrl()),
            Stat::make('Program groups', ProgramGroup::count())
                ->url(ProgramGroupResource::getUrl()),
        ];
    }
}
