<?php

namespace App\Filament\Resources\ProgramGroups\Pages;

use App\Filament\Resources\ProgramGroups\ProgramGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProgramGroup extends ViewRecord
{
    protected static string $resource = ProgramGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
