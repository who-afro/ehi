<?php

namespace App\Filament\Resources\AgeCohorts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AgeCohortInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('description')->markdown()->columnSpanFull(),
                TextEntry::make('min_age')->numeric(),
                TextEntry::make('max_age')->numeric(),
            ]);
    }
}
