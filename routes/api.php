<?php

use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\GardenDataController;
use App\Http\Controllers\RelayDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

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
Route::get('/sensor/data/last/week', [SensorDataController::class, 'lastWeekSensorData']);
Route::get('/sensor/data/last/month', [SensorDataController::class, 'lastMonthSensorData']);

Route::get('/sensor/data/error', function (Request $request) {
    Log::warning('NodeMCU ERROR', $request->all());
    return response()->json([
        'status' => 'received'
    ]);
});


Route::post('/relay/data/manual', [RelayDataController::class, 'manualRelayData']);
Route::get('/relay/data/status', [RelayDataController::class, 'statusRelayData']);
