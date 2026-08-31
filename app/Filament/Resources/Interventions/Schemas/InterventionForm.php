<?php

namespace App\Filament\Resources\Interventions\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InterventionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('condition_id')
                    ->relationship('condition', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('level_of_care_id')
                    ->relationship('levelOfCare', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('age_cohort_id')
                    ->relationship('ageCohort', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('public_health_function_id')
                    ->relationship('publicHealthFunction', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                MarkdownEditor::make('details_original')
                    ->label('From MS Word')
                    ->columnSpanFull(),
                MarkdownEditor::make('details')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('confirmed_with_evidence'),
            ]);
    }
}
