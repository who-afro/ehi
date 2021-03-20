<?php

namespace App\Lean\Resources;

use App\Models\InterventionCategory;
use Lean\Fields\ID;
use Lean\Fields\Pikaday;
use Lean\Fields\Relations\BelongsTo;
use Lean\Fields\Relations\HasMany;
use Lean\Fields\Text;
use Lean\Fields\Trix;
use Lean\LeanResource;

class ServiceResource extends LeanResource
{
    public static string $model = InterventionCategory::class;

    public static array $searchable = [
        'id',
        'name',
        'services.name'
    ];

    public static string $title = 'name';
    public static string $icon = 'heroicon-o-sparkles';
    public static int $resultsPerPage;

    public static array $lang = [
        // 'create.submit' => 'Create InterventionCategorySeeder',
        // 'notifications.created' => 'InterventionCategorySeeder created!',
        // ...
    ];

    public static function fields(): array
    {
        return [
            ID::make('id'),
            Text::make('name')
                ->label(__('Name'))
                ->rules(['required', 'max:100']),
            Trix::make('description')
                ->label(__('Description'))->optional(),
            BelongsTo::make('parent')->parent(ServiceResource::class)

        ];
    }

    public static function label(): string
    {
        return __('InterventionCategorySeeder');
    }

    public static function pluralLabel(): string
    {
        return __('Services');
    }
}
