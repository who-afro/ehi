<?php

namespace App\Filament\Resources\ProgramAreas\Pages;

use App\Filament\Resources\ProgramAreas\ProgramAreaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramArea extends EditRecord
{
    protected static string $resource = ProgramAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
