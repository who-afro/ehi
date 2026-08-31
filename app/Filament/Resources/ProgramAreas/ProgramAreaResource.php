<?php

namespace App\Filament\Resources\ProgramAreas;

use App\Filament\Resources\ProgramAreas\Pages\CreateProgramArea;
use App\Filament\Resources\ProgramAreas\Pages\EditProgramArea;
use App\Filament\Resources\ProgramAreas\Pages\ListProgramAreas;
use App\Filament\Resources\ProgramAreas\Pages\ViewProgramArea;
use App\Filament\Resources\ProgramAreas\Schemas\ProgramAreaForm;
use App\Filament\Resources\ProgramAreas\Schemas\ProgramAreaInfolist;
use App\Filament\Resources\ProgramAreas\Tables\ProgramAreasTable;
use App\Models\ProgramArea;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramAreaResource extends Resource
{
    protected static ?string $model = ProgramArea::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProgramAreaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramAreaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramAreasTable::configure($table);
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
            'index' => ListProgramAreas::route('/'),
            'create' => CreateProgramArea::route('/create'),
            'view' => ViewProgramArea::route('/{record}'),
            'edit' => EditProgramArea::route('/{record}/edit'),
        ];
    }
}
