<?php

namespace App\Filament\Resources\ProgramAreas\Pages;

use App\Filament\Resources\ProgramAreas\ProgramAreaResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProgramArea extends ViewRecord
{
    protected static string $resource = ProgramAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
