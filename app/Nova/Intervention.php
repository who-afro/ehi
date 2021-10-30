<?php

namespace App\Nova;

use App\Nova\Filters\AgeCohortFilter;
use App\Nova\Filters\ConditionFilter;
use App\Nova\Filters\LevelOfCareFilter;
use App\Nova\Filters\PublicHealthFunctionFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Markdown;

class Intervention extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Intervention::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'details',
    ];

    /**
     * The number of resources to show per page via relationships.
     *
     * @var int
     */
    public static $perPageViaRelationship = 25;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Condition')->sortable()->viewable(false),
            BelongsTo::make('LevelOfCare')->viewable(false),
            BelongsTo::make('AgeCohort')->viewable(false),
            BelongsTo::make('PublicHealthFunction')->sortable()->viewable(false),
            Markdown::make('From MS Word', 'details_original')->readonly()->showOnIndex(true),
            Markdown::make('Details', 'details')->alwaysShow()->showOnIndex(true),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new ConditionFilter,
            new LevelOfCareFilter,
            new AgeCohortFilter,
            new PublicHealthFunctionFilter,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
