<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route for fetching navigation data
Route::get('/dashboard', [NavigationController::class, 'show'])->name('dashboard');

// Route for displaying the dashboard view
// Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/history', function () {
    return view('history');
})->name('history');
require __DIR__ . '/auth.php';
