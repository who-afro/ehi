<?php

namespace App\Filament\Resources\PublicHealthFunctions\Pages;

use App\Filament\Resources\PublicHealthFunctions\PublicHealthFunctionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPublicHealthFunction extends ViewRecord
{
    protected static string $resource = PublicHealthFunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
