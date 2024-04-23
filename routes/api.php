<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\CalendarController;
<<<<<<< HEAD
use App\Http\Controllers\MessagesController;
=======
>>>>>>> 4691e566a54cbbf7be64d5734d0618f24759073f
use App\Http\Controllers\JWTTokenValidationController;

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
Route::controller(CalendarController::class)->middleware(['api', 'auth:api'])->prefix('events')->group(function () {
    Route::post('get', 'index');
    Route::post('/', 'store');
    Route::post('update/{event}', 'update');
    Route::delete('{event}', 'destroy');
});

// Auth
Route::controller(AuthController::class)->middleware('api')->prefix('auth')->group(function () {
    Route::get('user', 'user')->middleware('auth:api');
    Route::post('login', 'login')->middleware('guest:api');
    Route::post('register', 'register')->middleware('guest:api');
    Route::post('logout', 'logout')->middleware('auth:api');
});

<<<<<<< HEAD
// JWT Token
Route::controller(JWTTokenValidationController::class)->middleware(['api'])->prefix('token')->group(function () {
    Route::get('validate/{token}', 'validateToken');
});

=======
>>>>>>> 4691e566a54cbbf7be64d5734d0618f24759073f
// Tasks
Route::controller(TasksController::class)->middleware(['api', 'auth:api'])->prefix('tasks')->group(function () {
    Route::get('/', 'index');
});

<<<<<<< HEAD
// Messages
Route::controller(MessagesController::class)->middleware(['api', 'auth:api'])->prefix('messages')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
=======
// JWT Token
Route::controller(JWTTokenValidationController::class)->middleware(['api'])->prefix('token')->group(function () {
    Route::get('validate/{token}', 'validateToken');
>>>>>>> 4691e566a54cbbf7be64d5734d0618f24759073f
});