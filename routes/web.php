<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
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
Route::get('/admin', [HomeController::class, 'admin']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('games', GamesController::class);
Route::post('/games', [GamesController::class, 'store'])->name('games.store');
//Route::group(['prefix' => '/games'], function () {
//    Route::get('/', [GamesController::class, 'create']);
//    Route::post('/', [GamesController::class, 'store']);
//});
