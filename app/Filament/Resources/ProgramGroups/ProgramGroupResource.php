<?php

namespace App\Filament\Resources\ProgramGroups;

use App\Filament\Resources\ProgramGroups\Pages\CreateProgramGroup;
use App\Filament\Resources\ProgramGroups\Pages\EditProgramGroup;
use App\Filament\Resources\ProgramGroups\Pages\ListProgramGroups;
use App\Filament\Resources\ProgramGroups\Pages\ViewProgramGroup;
use App\Filament\Resources\ProgramGroups\Schemas\ProgramGroupForm;
use App\Filament\Resources\ProgramGroups\Schemas\ProgramGroupInfolist;
use App\Filament\Resources\ProgramGroups\Tables\ProgramGroupsTable;
use App\Models\ProgramGroup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramGroupResource extends Resource
{
    protected static ?string $model = ProgramGroup::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProgramGroupForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramGroupInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramGroupsTable::configure($table);
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
            'index' => ListProgramGroups::route('/'),
            'create' => CreateProgramGroup::route('/create'),
            'view' => ViewProgramGroup::route('/{record}'),
            'edit' => EditProgramGroup::route('/{record}/edit'),
        ];
    }
}
