<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Calendar
Route::controller(CalendarController::class)->prefix('events')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::post('update/{event}', 'update');
    Route::delete('/{event}', 'destroy');
});