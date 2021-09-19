<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class ProgramArea extends Model
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
        'uuid',
        'program_group_id',
        'slug'
    ];

    /**
     * The attributes are translatable
     *
     * @var array
     */
    public $translatable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function programGroup()
    {
        return $this->belongsTo(ProgramGroup::class);
    }

    public function conditions()
    {
        return $this->belongsToMany(Condition::class, 'program_area_conditions');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->uuid = Str::uuid();
        });

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }

    public function getIconUrlAttribute() {
        return asset('svg/'.$this->slug.'.svg');
    }
}
