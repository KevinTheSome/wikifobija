<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhobiaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'aNumber' => 0,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/md', [PhobiaController::class, 'create']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/phobias', [PhobiaController::class, 'Index']);
    Route::get('/phobia/create', [PhobiaController::class, 'Make']);
    Route::get('/phobia/{id}', [PhobiaController::class, 'Show']);

    Route::post('/phobia/{id}', [PhobiaController::class, 'update']);
    Route::delete('/phobia/{id}', [PhobiaController::class, 'delete']);
    Route::post('/phobia', [PhobiaController::class, 'create']);
});



require __DIR__.'/auth.php';
