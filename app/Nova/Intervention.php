<?php

namespace App\Nova;

use App\Nova\Filters\ConditionFilter;
use App\Nova\Filters\InterventionCategoryCountFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

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
            Markdown::make('Details','details')->alwaysShow(),
            BelongsToMany::make('Intervention Categories', 'InterventionCategories')->fields(function () {
                return [
                    Text::make('Details', 'details')
                        ->displayUsing(function(){
                            return isset($this->pivot) ? $this->pivot->details : '';
                        }),
                ];
            }),
            Text::make("Categories Count", function() {return $this->interventionCategories()->count(); })
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
            new InterventionCategoryCountFilter
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
