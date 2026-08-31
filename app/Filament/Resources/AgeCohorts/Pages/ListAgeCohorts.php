<?php

namespace App\Filament\Resources\AgeCohorts\Pages;

use App\Filament\Resources\AgeCohorts\AgeCohortResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgeCohorts extends ListRecords
{
    protected static string $resource = AgeCohortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
