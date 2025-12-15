<?php

use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\GardenDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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

Route::get('/garden/data', [GardenDataController::class, 'latestSensorData']);
Route::get('/sensor/data/latest', [SensorDataController::class, 'latestSensorData']);
Route::get('/sensor/data/last/day', [SensorDataController::class, 'lastDaySensorData']);
