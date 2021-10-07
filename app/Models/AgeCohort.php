<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class AgeCohort extends Model
{
    use HasFactory;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'min_age',
        'max_age',
        'uuid',
        'slug'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'min_age' => 'integer',
        'max_age' => 'integer',
    ];
    /**
     * The attributes that should be translatable
     *
     * @var array
     */
    public $translatable = ['name', 'description'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->uuid = Str::uuid();
        });
    }

    public function interventions() {
        return $this->hasMany(Intervention::class);
    }

    public function getIconUrlAttribute() {
        return asset('svg/'.$this->slug.'.svg');
    }
}
