<?php


namespace App\Lean\Resources;


use App\Models\AgeCohort;
use App\Models\Intervention;
use Lean\Fields\ID;
use Lean\Fields\Number;
use Lean\Fields\Relations\BelongsTo;
use Lean\Fields\Text;
use Lean\Fields\Trix;
use Lean\LeanResource;

class InterventionResource extends LeanResource
{
    public static string $model = Intervention::class;
    public static array $searchable = [
        'id',
        'details',
    ];
    public static string $title = 'details';
    public static string $icon = 'heroicon-o-user-group';

    /**
     * @inheritDoc
     */
    public static function fields(): array
    {
        return [
            ID::make('id'),
            BelongsTo::make('agecohort')->parent(AgeCohortResource::class)
                ->label(__('Age Cohort')),
            BelongsTo::make('interventionlevel')->parent(InterventionLevelResource::class)
                ->label(__('Intervention Level')),
            BelongsTo::make('publichealthfunction')->parent(PublicHealthFunctionResource::class)->label(__('Public Health Function')),
            BelongsTo::make('condition')->parent(ConditionResource::class)
                ->label(__('Condition')),
            Trix::make('details')
                ->label(__('Intervention'))
                ->rules(['required']),

            //
        ];
    }

    public static function label(): string {
        return "Interventions";
    }
}
