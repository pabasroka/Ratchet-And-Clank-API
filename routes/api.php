<?php

use App\Http\Controllers\GamesController;
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

Route::group(["prefix" => "/v1"], function () {

    // Games
    Route::group(["prefix" => "/games"], function () {
        Route::get("/", [GamesController::class, "index"]);
    });

    // Characters

    // Weapons

    // Gadgets

    // Planets

    // Enemies

    // etc

});

