<?php

namespace App\Filament\Resources\AgeCohorts\Pages;

use App\Filament\Resources\AgeCohorts\AgeCohortResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAgeCohort extends ViewRecord
{
    protected static string $resource = AgeCohortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
