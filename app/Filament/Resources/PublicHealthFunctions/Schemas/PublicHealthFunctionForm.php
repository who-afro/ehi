<?php

namespace App\Filament\Resources\PublicHealthFunctions\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PublicHealthFunctionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255),
                TextInput::make('sort_order')->numeric()->required(),
                MarkdownEditor::make('description')->columnSpanFull(),
            ]);
    }
}
