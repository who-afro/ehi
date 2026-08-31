<?php

namespace App\Filament\Resources\PublicHealthFunctions\Pages;

use App\Filament\Resources\PublicHealthFunctions\PublicHealthFunctionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPublicHealthFunctions extends ListRecords
{
    protected static string $resource = PublicHealthFunctionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
