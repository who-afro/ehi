<?php

namespace App\Filament\Resources\PublicHealthFunctions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PublicHealthFunctionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('sort_order')->numeric(),
                TextEntry::make('description')->markdown()->columnSpanFull(),
            ]);
    }
}
