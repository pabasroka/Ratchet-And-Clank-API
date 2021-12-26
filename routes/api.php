<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\PlatformsController;
use App\Http\Controllers\ReleasesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=> '/v1'], function () {

    // Game
    Route::group(['prefix' => '/games'], function () {
        Route::get('/', [GamesController::class, 'index']);
        Route::get('/{id}', [GamesController::class, 'show']);
    });

    // Release
    Route::group(['prefix' => '/releases'], function() {
        Route::get('/', [ReleasesController::class, 'index']);
    });

    //Platform
    Route::group(['prefix' => '/platforms'], function() {
        Route::get('/', [PlatformsController::class, 'index']);
    });

    // Characters

    // Weapons

    // Gadgets

    // Galaxies

    // Planets

    // Enemies

    // etc

});
