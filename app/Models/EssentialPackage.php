<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialPackage extends Model
{
    use HasFactory;

    public $fillable = [
        'conditions',
        'levels_of_care',
        'public_health_functions',
        'age_cohorts',
        'title',
        'description',
        'notification_emails',
    ];

    public $casts = [
        'conditions' => [],
        'levels_of_care' => [],
        'public_health_functions' => [],
        'age_cohorts' => [],
    ];
}
