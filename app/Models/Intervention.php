<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Intervention extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'details',
        'level_of_care_id',
        'public_health_function_id',
        'condition_id',
        'age_cohort_id',
        'uuid'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    public function ageCohort()
    {
        return $this->belongsTo(AgeCohort::class);
    }

    public function levelofcare()
    {
        return $this->belongsTo(LevelOfCare::class);
    }

    public function publicHealthFunction()
    {
        return $this->belongsTo(PublicHealthFunction::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function programAreas() {
        return $this->belongsToMany(ProgramArea::class);
    }

    public function interventioncategories() {
        return $this->belongsToMany(InterventionCategory::class)->withPivot('details');
    }
}
