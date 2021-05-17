<?php

use App\Http\Livewire\AgeCohortInterventions;
use App\Http\Livewire\Interventions;
use App\Http\Livewire\LevelOfCareInterventions;
use App\Http\Livewire\ConditionInterventions;
use App\Http\Livewire\ProgramAreaInterventions;
use App\Http\Livewire\PublicHealthFunctionInterventions;
use App\Http\Livewire\ServiceAreaInterventions;
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

Route::view('/', "welcome")->name("home");
Route::view('/faqs', "frequently-asked-questions")->name("faqs");
Route::get('/age-cohort/{age_cohort_id}', AgeCohortInterventions::class)->name("age-cohort");
Route::get('/interventions-list', Interventions::class)->name("interventions-list");
Route::view('/level-of-care-overview', 'level-of-care-overview')->name("level-of-care-overview");
Route::get('/level-of-care/{level_of_care_id}', LevelOfCareInterventions::class)->name("level-of-care");
Route::view('/public-health-function-overview', 'public-health-function-overview')->name("public-health-function-overview");
Route::get('/public-health-function/{public_health_function_id}', PublicHealthFunctionInterventions::class)->name("public-health-function");
Route::view('/program-area-overview', 'program-area-overview')->name("program-area-overview");
Route::get('/program-area/{program_area_id}', ProgramAreaInterventions::class)->name("program-area");
Route::get('/condition/{condition_id}/program-area/{program_area_id}', ConditionInterventions::class)->name("condition");
Route::view('/service-area-overview', 'service-area-overview')->name("service-area-overview");
Route::get('/service-area/{service_area_id}', ServiceAreaInterventions::class)->name("service-area");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');
