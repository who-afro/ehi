<?php

namespace App\Filament\Resources\ProgramAreas\Pages;

use App\Filament\Resources\ProgramAreas\ProgramAreaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramAreas extends ListRecords
{
    protected static string $resource = ProgramAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
