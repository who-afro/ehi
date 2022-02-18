<?php

use App\Http\Livewire\AgeCohortInterventions;
use App\Http\Livewire\ConditionInterventions;
use App\Http\Livewire\EssentialPackageComponent;
use App\Http\Livewire\Interventions;
use App\Http\Livewire\LevelOfCareInterventions;
use App\Http\Livewire\ProgramAreaInterventions;
use App\Http\Livewire\PublicHealthFunctionInterventions;
use App\Http\Livewire\ServiceAreaInterventions;
use App\Models\EssentialPackage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');
Route::view('/faqs', 'frequently-asked-questions')->name('faqs');
Route::view('/age-cohort-overview', 'age-cohort-overview')->name('age-cohort-overview');
Route::get('/age-cohort/{age_cohort_id}', AgeCohortInterventions::class)->name('age-cohort');
Route::view('/condition-overview', 'condition-overview')->name('condition-overview');
Route::get('/interventions', Interventions::class)->name('interventions');
Route::view('/level-of-care-overview', 'level-of-care-overview')->name('level-of-care-overview');
Route::get('/level-of-care/{level_of_care_id}', LevelOfCareInterventions::class)->name('level-of-care');
Route::view('/public-health-function-overview', 'public-health-function-overview')->name('public-health-function-overview');
Route::get('/public-health-function/{public_health_function_id}', PublicHealthFunctionInterventions::class)->name('public-health-function');
Route::view('/program-area-overview', 'program-area-overview')->name('program-area-overview');
Route::get('/program-area/{program_area_id}', ProgramAreaInterventions::class)->name('program-area');
Route::get('/condition/{condition_id}', ConditionInterventions::class)->name('condition');

Route::get('/build-essential-package/{id?}', EssentialPackageComponent::class)->name('build-essential-package');
Route::get('/show-essential-package/{package:uuid}', \App\Http\Controllers\ShowEssentialPackageController::class)->name('show-essential-package');
Route::get('/download-essential-package/{package:uuid}', \App\Http\Controllers\DownloadEssentialsPackage::class)->name('download-essential-package');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');
