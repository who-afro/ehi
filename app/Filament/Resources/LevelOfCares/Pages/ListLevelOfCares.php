<?php

namespace App\Filament\Resources\LevelOfCares\Pages;

use App\Filament\Resources\LevelOfCares\LevelOfCareResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLevelOfCares extends ListRecords
{
    protected static string $resource = LevelOfCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
