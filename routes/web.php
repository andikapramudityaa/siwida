<?php

use App\Http\Controllers\AdminTourismController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestTourismController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\UserController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('villages/{village}', 'getVillage');
});
Route::get('tourisms/{tourism}', [TourismController::class, 'getTourism']);
Route::resource('requestTourisms', RequestTourismController::class)->only(['create', 'store']);

Route::middleware('guest')->group(function () {
    Route::controller(SessionController::class)->group(function () {
        Route::get('login', 'login');
        Route::post('validate', 'validateAccount');
        Route::resource('users', UserController::class)->only(['create', 'store']);
    });
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionController::class, 'logout']);
});

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('tourisms', AdminTourismController::class)->except('show');
        Route::resource('requestTourisms', RequestTourismController::class)->only(['index', 'show', 'destroy']);
        Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
        Route::put('users/promote/{user}', [UserController::class, 'promote']);
    });
});
