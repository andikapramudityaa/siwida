<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestTourismController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\UserController;
use App\Models\RequestTourism;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/villages/{village}', [VillageController::class, 'getVillage']);
Route::get('/tourisms/{tourism}', [TourismController::class, 'getTourism']);

Route::resource('/req', RequestTourismController::class);

Route::controller(SessionController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'login');
        Route::post('validate', 'validateAccount');
    });
    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout');
    });
});

Route::resource('/users', UserController::class);
