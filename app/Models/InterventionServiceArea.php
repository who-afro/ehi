<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InterventionServiceArea extends Pivot
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'intervention_service_area';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'details',
        'intervention_id',
        'service_area_id',
    ];

    public function serviceArea() {
        return $this->belongsTo(ServiceArea::class);
    }

    public function intervention() {
        return $this->belongsTo(Intervention::class);
    }
}
