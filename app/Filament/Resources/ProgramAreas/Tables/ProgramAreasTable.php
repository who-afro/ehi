<?php

namespace App\Filament\Resources\ProgramAreas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProgramAreasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('programGroup.name')->label('Program group')->searchable()->sortable(),
                TextColumn::make('conditions_count')->counts('conditions')->label('Conditions'),
            ])
            ->filters([
                SelectFilter::make('program_group_id')
                    ->label('Program group')
                    ->relationship('programGroup', 'name')
                    ->searchable()
                    ->preload(),
            ], FiltersLayout::AboveContent)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ], RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
