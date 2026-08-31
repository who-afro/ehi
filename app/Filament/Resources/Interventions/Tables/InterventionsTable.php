<?php

namespace App\Filament\Resources\Interventions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class InterventionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('condition.name')->searchable()->sortable(),
                TextColumn::make('levelOfCare.name')->label('Level of care')->sortable(),
                TextColumn::make('ageCohort.name')->label('Age cohort')->sortable(),
                TextColumn::make('publicHealthFunction.name')->label('Public health function')->sortable(),
                TextColumn::make('details')->markdown()->searchable()->limit(100)->wrap(),
                IconColumn::make('confirmed_with_evidence')->boolean(),
            ])
            ->filters([
                SelectFilter::make('condition_id')
                    ->relationship('condition', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('level_of_care_id')
                    ->label('Level of care')
                    ->relationship('levelOfCare', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('age_cohort_id')
                    ->label('Age cohort')
                    ->relationship('ageCohort', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('public_health_function_id')
                    ->label('Public health function')
                    ->relationship('publicHealthFunction', 'name')
                    ->searchable()
                    ->preload(),
                TernaryFilter::make('confirmed_with_evidence'),
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
