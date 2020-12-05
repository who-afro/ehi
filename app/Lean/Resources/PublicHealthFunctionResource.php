<?php


namespace App\Lean\Resources;


use App\Models\PublicHealthFunction;
use Lean\Fields\ID;
use Lean\Fields\Text;
use Lean\Fields\Trix;
use Lean\LeanResource;

class PublicHealthFunctionResource extends LeanResource
{
    public static string $model = PublicHealthFunction::class;
    public static array $searchable = [
        'id',
        'name',
    ];
    public static string $title = 'name';
    public static string $icon = 'heroicon-o-shield-check';

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
        return "Public Health Function";
    }
}
