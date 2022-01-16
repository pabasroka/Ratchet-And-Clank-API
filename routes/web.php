<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GadgetController;
use App\Http\Controllers\GalaxyController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SkillPointController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\WeaponEvolutionController;
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
Route::get('/data', [HomeController::class, 'data'])->withoutMiddleware(['auth'])->name('data');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/debug', [HomeController::class, 'debug'])->name('debug');

Route::group(['prefix' => '/games'], function () {
    Route::get('/', [GamesController::class, 'create'])->withoutMiddleware(['auth'])->name('games.create');
    Route::post('/', [GamesController::class, 'store'])->withoutMiddleware(['auth'])->name('games.store');
    Route::get('/edit', [GamesController::class, 'edit'])->name('games.edit');
    Route::put('/{id}', [GamesController::class, 'update'])->name('games.update');
});

Route::group(['prefix' => '/races'], function () {
    Route::get('/', [RaceController::class, 'create'])->withoutMiddleware(['auth'])->name('races.create');
    Route::post('/', [RaceController::class, 'store'])->withoutMiddleware(['auth'])->name('races.store');
    Route::get('/edit', [RaceController::class, 'edit'])->name('races.edit');
    Route::put('/{id}', [RaceController::class, 'update'])->name('races.update');
    Route::delete('/{id}', [RaceController::class, 'destroy'])->name('races.destroy');
});

Route::group(['prefix' => '/galaxies'], function () {
    Route::get('/', [GalaxyController::class, 'create'])->withoutMiddleware(['auth'])->name('galaxies.create');
    Route::post('/', [GalaxyController::class, 'store'])->withoutMiddleware(['auth'])->name('galaxies.store');
    Route::get('/edit', [GalaxyController::class, 'edit'])->name('galaxies.edit');
    Route::put('/{id}', [GalaxyController::class, 'update'])->name('galaxies.update');
    Route::delete('/{id}', [GalaxyController::class, 'destroy'])->name('galaxies.destroy');
});

Route::group(['prefix' => '/planets'], function () {
    Route::get('/', [PlanetController::class, 'create'])->withoutMiddleware(['auth'])->name('planets.create');
    Route::post('/', [PlanetController::class, 'store'])->withoutMiddleware(['auth'])->name('planets.store');
    Route::get('/edit', [PlanetController::class, 'edit'])->name('planets.edit');
    Route::put('/{id}', [PlanetController::class, 'update'])->name('planets.update');
    Route::delete('/{id}', [PlanetController::class, 'destroy'])->name('planets.destroy');
});

Route::group(['prefix' => '/skillpoints'], function () {
    Route::get('/', [SkillPointController::class, 'create'])->withoutMiddleware(['auth'])->name('skillpoints.create');
    Route::post('/', [SkillPointController::class, 'store'])->withoutMiddleware(['auth'])->name('skillpoints.store');
    Route::get('/edit', [SkillPointController::class, 'edit'])->name('skillpoints.edit');
    Route::put('/{id}', [SkillPointController::class, 'update'])->name('skillpoints.update');
    Route::delete('/{id}', [SkillPointController::class, 'destroy'])->name('skillpoints.destroy');
});

Route::group(['prefix' => '/vehicles'], function () {
    Route::get('/', [VehicleController::class, 'create'])->withoutMiddleware(['auth'])->name('vehicles.create');
    Route::post('/', [VehicleController::class, 'store'])->withoutMiddleware(['auth'])->name('vehicles.store');
    Route::get('/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
});

Route::group(['prefix' => '/gadgets'], function () {
    Route::get('/', [GadgetController::class, 'create'])->withoutMiddleware(['auth'])->name('gadgets.create');
    Route::post('/', [GadgetController::class, 'store'])->withoutMiddleware(['auth'])->name('gadgets.store');
    Route::get('/edit', [GadgetController::class, 'edit'])->name('gadgets.edit');
    Route::put('/{id}', [GadgetController::class, 'update'])->name('gadgets.update');
    Route::delete('/{id}', [GadgetController::class, 'destroy'])->name('gadgets.destroy');
});

Route::group(['prefix' => '/organizations'], function () {
    Route::get('/', [OrganizationController::class, 'create'])->withoutMiddleware(['auth'])->name('organizations.create');
    Route::post('/', [OrganizationController::class, 'store'])->withoutMiddleware(['auth'])->name('organizations.store');
    Route::get('/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::put('/{id}', [OrganizationController::class, 'update'])->name('organizations.update');
    Route::delete('/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');
});

Route::group(['prefix' => '/characters'], function () {
    Route::get('/', [CharacterController::class, 'create'])->withoutMiddleware(['auth'])->name('characters.create');
    Route::post('/', [CharacterController::class, 'store'])->withoutMiddleware(['auth'])->name('characters.store');
    Route::get('/edit', [CharacterController::class, 'edit'])->name('characters.edit');
    Route::put('/{id}', [CharacterController::class, 'update'])->name('characters.update');
    Route::delete('/{id}', [CharacterController::class, 'destroy'])->name('characters.destroy');
});

Route::group(['prefix' => '/weapons'], function () {
    Route::get('/', [WeaponController::class, 'create'])->withoutMiddleware(['auth'])->name('weapons.create');
    Route::post('/', [WeaponController::class, 'store'])->withoutMiddleware(['auth'])->name('weapons.store');
    Route::get('/edit', [WeaponController::class, 'edit'])->name('weapons.edit');
    Route::put('/{id}', [WeaponController::class, 'update'])->name('weapons.update');
    Route::delete('/{id}', [WeaponController::class, 'destroy'])->name('weapons.destroy');
});

Route::group(['prefix' => '/weaponsEvolution'], function () {
    Route::post('/', [WeaponEvolutionController::class, 'store'])->withoutMiddleware(['auth'])->name('weaponsEvolution.store');
    Route::get('/edit', [WeaponEvolutionController::class, 'edit'])->name('weaponsEvolution.edit');
    Route::put('/{id}', [WeaponEvolutionController::class, 'update'])->name('weaponsEvolution.update');
    Route::delete('/{id}', [WeaponEvolutionController::class, 'destroy'])->name('weaponsEvolution.destroy');
});
