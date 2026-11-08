<?php

namespace App\Models;

use App\View\ReferenceData;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ReferenceDataObserver implements ShouldHandleEventsAfterCommit
{
    public function saved(Model $model): void
    {
        Cache::memo()->forget(ReferenceData::CacheKey);
    }

    public function deleted(Model $model): void
    {
        Cache::memo()->forget(ReferenceData::CacheKey);
    }
}
