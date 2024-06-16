<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\WellController;
use App\Http\Controllers\SensorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route for fetching navigation data
Route::get('/dashboard', [NavigationController::class, 'show'])->name('dashboard');

// Route for showing well details
Route::get('/dashboard/well/{id}', [WellController::class, 'show'])->name('well.show');

// Route for showing sensor details within a well
Route::get('/dashboard/well/{well_id}/{sensor_id}', [SensorController::class, 'show'])->name('wellSensor.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/history', function () {
    return view('history');
})->name('history');
require __DIR__ . '/auth.php';
