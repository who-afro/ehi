<?php

namespace App\Filament\Resources\Conditions\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ConditionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        self::translationTab('English', 'en'),
                        self::translationTab('French', 'fr'),
                        self::translationTab('Portuguese', 'pt'),
                    ])
                    ->columnSpanFull(),
                Select::make('program_area_id')
                    ->relationship('programArea', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('who')->label('WHO reference')->maxLength(255),
                TextInput::make('snomed')->label('SNOMED code')->maxLength(255),
            ]);
    }

    private static function translationTab(string $label, string $locale): Tab
    {
        return Tab::make($label)
            ->schema([
                TextInput::make("name.{$locale}")->required($locale === 'en'),
                MarkdownEditor::make("description.{$locale}"),
            ]);
    }
}
