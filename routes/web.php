<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;


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


Route::get('', [TeamController::class, 'league_top'])->name('home');




Route::prefix('leagues')->group(function () {

    Route::get('', [LeagueController::class, 'index'])->name('leagues.index');
    Route::get('/{id}/{name}', [LeagueController::class, 'show'])->name('leagues.show');

});

Route::prefix('teams')->group(function () {
    Route::get('', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/leaders', [TeamController::class, 'leaders'])->name('teams.leaders');
    Route::get('/{id}/{name}', [TeamController::class, 'show'])->name('teams.show');
});


