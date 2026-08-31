<?php

namespace App\Filament\Resources\PublicHealthFunctions;

use App\Filament\Resources\PublicHealthFunctions\Pages\CreatePublicHealthFunction;
use App\Filament\Resources\PublicHealthFunctions\Pages\EditPublicHealthFunction;
use App\Filament\Resources\PublicHealthFunctions\Pages\ListPublicHealthFunctions;
use App\Filament\Resources\PublicHealthFunctions\Pages\ViewPublicHealthFunction;
use App\Filament\Resources\PublicHealthFunctions\Schemas\PublicHealthFunctionForm;
use App\Filament\Resources\PublicHealthFunctions\Schemas\PublicHealthFunctionInfolist;
use App\Filament\Resources\PublicHealthFunctions\Tables\PublicHealthFunctionsTable;
use App\Models\PublicHealthFunction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PublicHealthFunctionResource extends Resource
{
    protected static ?string $model = PublicHealthFunction::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PublicHealthFunctionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PublicHealthFunctionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicHealthFunctionsTable::configure($table);
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
            'index' => ListPublicHealthFunctions::route('/'),
            'create' => CreatePublicHealthFunction::route('/create'),
            'view' => ViewPublicHealthFunction::route('/{record}'),
            'edit' => EditPublicHealthFunction::route('/{record}/edit'),
        ];
    }
}
