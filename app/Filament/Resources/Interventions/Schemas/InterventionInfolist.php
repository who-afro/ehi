<?php

namespace App\Filament\Resources\Interventions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InterventionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('condition.name'),
                TextEntry::make('levelOfCare.name')->label('Level of care'),
                TextEntry::make('ageCohort.name')->label('Age cohort'),
                TextEntry::make('publicHealthFunction.name')->label('Public health function'),
                TextEntry::make('details_original')->label('From MS Word')->markdown()->columnSpanFull(),
                TextEntry::make('details')->markdown()->columnSpanFull(),
                IconEntry::make('confirmed_with_evidence')->boolean(),
            ]);
    }
}
