<?php

namespace App\Filament\Resources\Conditions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ConditionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('programArea.name')->label('Program area')->searchable()->sortable(),
                TextColumn::make('who')->label('WHO reference')->searchable(),
                TextColumn::make('snomed')->label('SNOMED')->searchable(),
                TextColumn::make('interventions_count')->counts('interventions')->label('Interventions'),
            ])
            ->filters([
                SelectFilter::make('program_area_id')
                    ->label('Program area')
                    ->relationship('programArea', 'name')
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
