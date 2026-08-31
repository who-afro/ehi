<?php

namespace App\Filament\Resources\LevelOfCares\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LevelOfCareInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('description')->markdown()->columnSpanFull(),
            ]);
    }
}
