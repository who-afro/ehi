<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'uuid',
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

        // Order by name ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id', 'id');
    }

    public function childrenServices()
    {
        return $this->hasMany(Service::class, 'parent_id', 'id')->with('services');
    }

    public function programAreas() {
        return $this->belongsToMany(ProgramArea::class);
    }

    public function interventions() {
        return $this->belongsToMany(Intervention::class)->withPivot('details');
    }
}
