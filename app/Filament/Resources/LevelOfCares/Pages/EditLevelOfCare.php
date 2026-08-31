<?php

namespace App\Filament\Resources\LevelOfCares\Pages;

use App\Filament\Resources\LevelOfCares\LevelOfCareResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLevelOfCare extends EditRecord
{
    protected static string $resource = LevelOfCareResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
