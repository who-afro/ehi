<?php


namespace App\Lean\Resources;


use App\Models\ProgramArea;
use Lean\Fields\ID;
use Lean\Fields\Text;
use Lean\Fields\Trix;
use Lean\LeanResource;

class ProgramAreaResource extends LeanResource
{
    public static string $model = ProgramArea::class;
    public static array $searchable = [
        'id',
        'name',
    ];
    public static string $title = 'name';
    public static string $icon = 'heroicon-o-user-group';

    /**
     * @inheritDoc
     */
    public static function fields(): array
    {
        return [
            ID::make('id'),
            Text::make('name')
                ->label(__('Name'))
                ->rules(['required', 'max:100']),
            Trix::make('description')
                ->label(__('Description'))->optional(),
        ];
    }

    public static function label(): string {
        return "Program Area";
    }
}
