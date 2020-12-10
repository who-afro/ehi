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
        return $this->belongsTo(\App\Models\AgeCohort::class);
    }

    public function interventionLevel()
    {
        return $this->belongsTo(\App\Models\InterventionLevel::class);
    }

    public function publicHealthFunction()
    {
        return $this->belongsTo(\App\Models\PublicHealthFunction::class);
    }

    public function condition()
    {
        return $this->belongsTo(\App\Models\Condition::class);
    }
}
