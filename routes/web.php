<?php

use App\Http\Livewire\Interventions;
use Illuminate\Support\Facades\Route;
use Lean\Lean;

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

Route::redirect('/', "interventions-list");
Route::get('/interventions-list', Interventions::class)->name("interventions-list");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/admin/p/home');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Lean::routes(['home' => '/admin/p/home']);
});
