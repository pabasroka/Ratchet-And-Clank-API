<?php

use App\Http\Controllers\GadgetController;
use App\Http\Controllers\GalaxyController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\PlatformsController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\ReleasesController;
use App\Http\Controllers\SkillPointController;
use App\Http\Controllers\VehicleController;
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

    // All routes
    Route::get('/', function () {
        $routes = Route::getRoutes();
        $apiRoutes = [];
        foreach ($routes as $route) {
            if (str_starts_with($route->uri, 'api/v1/')) {
                $routeElements = explode('/', $route->uri);
                $routeName = end($routeElements);
                if ($routeName != '{id}') {
                    $apiRoutes[] = [
                        $routeName => url($route->uri),
                    ];
                }
            }
        }
       return $apiRoutes;
    });

    // Games
    Route::group(['prefix' => '/games'], function () {
        Route::get('/', [GamesController::class, 'index']);
        Route::get('/{id}', [GamesController::class, 'show']);
    });

    // Releases
    Route::group(['prefix' => '/releases'], function() {
        Route::get('/', [ReleasesController::class, 'index']);
        Route::get('/{id}', [ReleasesController::class, 'show']);
    });

    // Platforms
    Route::group(['prefix' => '/platforms'], function() {
        Route::get('/', [PlatformsController::class, 'index']);
        Route::get('/{id}', [PlatformsController::class, 'show']);
    });

    // Races
    Route::group(['prefix' => '/races'], function() {
        Route::get('/', [RaceController::class, 'index']);
        Route::get('/{id}', [RaceController::class, 'show']);
    });

    // Galaxies
    Route::group(['prefix' => '/galaxies'], function() {
        Route::get('/', [GalaxyController::class, 'index']);
        Route::get('/{id}', [GalaxyController::class, 'show']);
    });

    // Planets
    Route::group(['prefix' => '/planets'], function() {
        Route::get('/', [PlanetController::class, 'index']);
        Route::get('/{id}', [PlanetController::class, 'show']);
    });

    // Skill Points
    Route::group(['prefix' => '/skillpoints'], function() {
        Route::get('/', [SkillPointController::class, 'index']);
        Route::get('/{id}', [SkillPointController::class, 'show']);
    });

    // Vehicles
    Route::group(['prefix' => '/vehicles'], function() {
        Route::get('/', [VehicleController::class, 'index']);
        Route::get('/{id}', [VehicleController::class, 'show']);
    });

    // Characters

    // Weapons

    // Gadgets
    Route::group(['prefix' => '/gadgets'], function() {
        Route::get('/', [GadgetController::class, 'index']);
        Route::get('/{id}', [GadgetController::class, 'show']);
    });

    // Organizations
    Route::group(['prefix' => '/organizations'], function() {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{id}', [OrganizationController::class, 'show']);
    });

    // Enemies

    // etc

});
