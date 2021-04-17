<?php

use App\Http\Livewire\AgeCohortInterventions;
use App\Http\Livewire\Interventions;
use App\Http\Livewire\LevelOfCareInterventions;
use App\Http\Livewire\ProgramAreaInterventions;
use App\Http\Livewire\PublicHealthFunctionInterventions;
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

Route::view('/', "welcome");
Route::get('/age-cohort/{age_cohort_id}', AgeCohortInterventions::class)->name("age-cohort");
Route::get('/interventions-list', Interventions::class)->name("interventions-list");
Route::get('/level-of-care/{level_of_care_id}', LevelOfCareInterventions::class)->name("level-of-care");
Route::get('/public-health-function/{public_health_function_id}', PublicHealthFunctionInterventions::class)->name("public-health-function");
Route::get('/program-area/{program_area_id}', ProgramAreaInterventions::class)->name("program-area");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
