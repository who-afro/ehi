<?php

namespace App\Filament\Resources\Conditions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConditionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('programArea.name')->label('Program area'),
                TextEntry::make('description')->markdown()->columnSpanFull(),
                TextEntry::make('who')->label('WHO reference'),
                TextEntry::make('snomed')->label('SNOMED code'),
            ]);
    }
}
