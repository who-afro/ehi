<?php

namespace App\Nova\Filters;

use App\Models\PublicHealthFunction;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ConfirmedWithEvidenceFilter extends Filter
{

    /**
     * Apply the filter to the given query.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('confirmed_with_evidence', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Yes' => 1,
            'No' => 0,
        ];
    }
}
