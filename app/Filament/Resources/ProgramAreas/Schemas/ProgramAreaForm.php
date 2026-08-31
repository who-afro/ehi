<?php

namespace App\Filament\Resources\ProgramAreas\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ProgramAreaForm
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
                Select::make('program_group_id')
                    ->relationship('programGroup', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('slug')->required()->maxLength(255),
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
