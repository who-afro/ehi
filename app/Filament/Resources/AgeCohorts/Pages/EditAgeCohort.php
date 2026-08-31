<?php

namespace App\Filament\Resources\AgeCohorts\Pages;

use App\Filament\Resources\AgeCohorts\AgeCohortResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAgeCohort extends EditRecord
{
    protected static string $resource = AgeCohortResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
