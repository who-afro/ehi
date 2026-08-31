<?php

namespace App\Filament\Resources\PublicHealthFunctions\Pages;

use App\Filament\Resources\PublicHealthFunctions\PublicHealthFunctionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicHealthFunction extends EditRecord
{
    protected static string $resource = PublicHealthFunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
