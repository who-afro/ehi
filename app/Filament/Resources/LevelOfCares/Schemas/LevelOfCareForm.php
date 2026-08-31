<?php

namespace App\Filament\Resources\LevelOfCares\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LevelOfCareForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255),
                MarkdownEditor::make('description')->columnSpanFull(),
            ]);
    }
}
