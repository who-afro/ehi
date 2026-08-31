<?php

namespace App\Filament\Resources\LevelOfCares\Pages;

use App\Filament\Resources\LevelOfCares\LevelOfCareResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLevelOfCare extends ViewRecord
{
    protected static string $resource = LevelOfCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
