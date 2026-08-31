<?php

namespace App\Filament\Resources\ProgramAreas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProgramAreaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('programGroup.name')->label('Program group'),
                TextEntry::make('description')->markdown()->columnSpanFull(),
                TextEntry::make('slug'),
            ]);
    }
}
