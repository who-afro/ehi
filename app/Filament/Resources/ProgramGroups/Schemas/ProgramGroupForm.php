<?php

namespace App\Filament\Resources\ProgramGroups\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramGroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                MarkdownEditor::make('description')->columnSpanFull(),
            ]);
    }
}
