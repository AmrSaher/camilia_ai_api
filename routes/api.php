<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Calendar
Route::controller(CalendarController::class)->middleware('api')->prefix('events')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::post('update/{event}', 'update');
    Route::delete('/{event}', 'destroy');
});

// Auth
Route::controller(AuthController::class)->middleware('api')->prefix('auth')->group(function () {
    Route::get('user', 'user')->middleware('auth:api');
    Route::post('login', 'login')->middleware('guest:api');
    Route::post('register', 'register')->middleware('guest:api');
    Route::post('logout', 'logout')->middleware('auth:api');
});