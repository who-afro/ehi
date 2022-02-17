<?php

namespace App\Http\Controllers;

use App\Models\EssentialPackage;
use Illuminate\Http\Request;

class DownloadEssentialsPackage extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke(EssentialPackage $package)
    {
        //
    }
}
