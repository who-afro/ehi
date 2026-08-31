<?php

namespace App\Filament\Resources\LevelOfCares;

use App\Filament\Resources\LevelOfCares\Pages\CreateLevelOfCare;
use App\Filament\Resources\LevelOfCares\Pages\EditLevelOfCare;
use App\Filament\Resources\LevelOfCares\Pages\ListLevelOfCares;
use App\Filament\Resources\LevelOfCares\Pages\ViewLevelOfCare;
use App\Filament\Resources\LevelOfCares\Schemas\LevelOfCareForm;
use App\Filament\Resources\LevelOfCares\Schemas\LevelOfCareInfolist;
use App\Filament\Resources\LevelOfCares\Tables\LevelOfCaresTable;
use App\Models\LevelOfCare;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LevelOfCareResource extends Resource
{
    protected static ?string $model = LevelOfCare::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LevelOfCareForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LevelOfCareInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LevelOfCaresTable::configure($table);
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
            'index' => ListLevelOfCares::route('/'),
            'create' => CreateLevelOfCare::route('/create'),
            'view' => ViewLevelOfCare::route('/{record}'),
            'edit' => EditLevelOfCare::route('/{record}/edit'),
        ];
    }
}
