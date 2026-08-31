<?php

namespace App\Filament\Resources\ProgramGroups\Pages;

use App\Filament\Resources\ProgramGroups\ProgramGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramGroup extends EditRecord
{
    protected static string $resource = ProgramGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
