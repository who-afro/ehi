<?php

namespace App\Filament\Resources\AgeCohorts;

use App\Filament\Resources\AgeCohorts\Pages\CreateAgeCohort;
use App\Filament\Resources\AgeCohorts\Pages\EditAgeCohort;
use App\Filament\Resources\AgeCohorts\Pages\ListAgeCohorts;
use App\Filament\Resources\AgeCohorts\Pages\ViewAgeCohort;
use App\Filament\Resources\AgeCohorts\Schemas\AgeCohortForm;
use App\Filament\Resources\AgeCohorts\Schemas\AgeCohortInfolist;
use App\Filament\Resources\AgeCohorts\Tables\AgeCohortsTable;
use App\Models\AgeCohort;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgeCohortResource extends Resource
{
    protected static ?string $model = AgeCohort::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AgeCohortForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AgeCohortInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgeCohortsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgeCohorts::route('/'),
            'create' => CreateAgeCohort::route('/create'),
            'view' => ViewAgeCohort::route('/{record}'),
            'edit' => EditAgeCohort::route('/{record}/edit'),
        ];
    }
}
