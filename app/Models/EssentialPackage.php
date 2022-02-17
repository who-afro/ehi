<?php

namespace App\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialPackage extends Model
{
    use HasFactory;
    use GeneratesUuid;


    public $fillable = [
        'conditions',
        'levels_of_care',
        'public_health_functions',
        'age_cohorts',
        'title',
        'description',
        'notification_emails',
        'uuid'
    ];

    public $casts = [
        'conditions' => 'array',
        'levels_of_care' => 'array',
        'public_health_functions' =>'array',
        'age_cohorts' => 'array',
    ];
}
