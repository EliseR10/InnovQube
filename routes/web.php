<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Livewire\BookingManager;

//Group of routes that require authentication
Route::middleware('auth')->group(function () {
    
    //Route for the main welcome page
    Route::get('/', [PropertyController::class, 'index'])->name('welcome');

    //Route for the dashboard page
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/booking', BookingManager::class)->name('booking');
});

require __DIR__.'/auth.php';
