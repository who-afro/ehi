<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InterventionDetails extends Pivot
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'intervention_intervention_category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'details',
        'intervention_id',
        'intervention_category_id',
    ];

    public function interventionCategory() {
        return $this->belongsTo(InterventionCategory::class);
    }

    public function intervention() {
        return $this->belongsTo(Intervention::class);
    }
}
