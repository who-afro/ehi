<?php

namespace App\Http\Controllers;

use App\Models\EssentialPackage;

class ShowEssentialPackageController extends Controller
{
    public function __invoke(EssentialPackage $package)
    {
        return view('show-package', ['package' => $package]);
    }
}
