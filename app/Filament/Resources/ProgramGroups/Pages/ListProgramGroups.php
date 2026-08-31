<?php

namespace App\Filament\Resources\ProgramGroups\Pages;

use App\Filament\Resources\ProgramGroups\ProgramGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramGroups extends ListRecords
{
    protected static string $resource = ProgramGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
