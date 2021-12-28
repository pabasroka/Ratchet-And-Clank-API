<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GalaxyController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RaceController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->withoutMiddleware(['auth'])->name('welcome');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => '/games'], function () {
    Route::get('/', [GamesController::class, 'create'])->withoutMiddleware(['auth'])->name('games.create');
    Route::post('/', [GamesController::class, 'store'])->withoutMiddleware(['auth'])->name('games.store');
    Route::put('/{id}', [GamesController::class, 'update'])->name('games.update');
});

Route::group(['prefix' => '/races'], function () {
    Route::get('/', [RaceController::class, 'create'])->withoutMiddleware(['auth'])->name('races.create');
    Route::post('/', [RaceController::class, 'store'])->withoutMiddleware(['auth'])->name('races.store');
});

Route::group(['prefix' => '/galaxies'], function () {
    Route::get('/', [GalaxyController::class, 'create'])->withoutMiddleware(['auth'])->name('galaxies.create');
    Route::post('/', [GalaxyController::class, 'store'])->withoutMiddleware(['auth'])->name('galaxies.store');
});
