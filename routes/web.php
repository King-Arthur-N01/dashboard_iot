<?php

use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\GardenDataController;
use App\Http\Controllers\RelayDataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard_page.view_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create/garden', function () {
    return view('layouts.garden_page.create_garden');
})->name('page.create.garden');
Route::post('/create/garden/data', [GardenDataController::class, 'createGardenData'])->name('create.garden');

Route::get('/update/garden', function () {
    return view('layouts.garden_page.update_garden');
})->name('page.update.garden');
Route::post('/update/garden/data', [GardenDataController::class, 'updateGardenData'])->name('update.garden');

Route::get('/sensor/report', [SensorDataController::class, 'summarySensorData'])->name('page.sensor.report');

require __DIR__.'/auth.php';
