<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhobiaController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'aNumber' => PhobiaController::getPhobiaCount(),
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
    Route::get('/phobias', [PhobiaController::class, 'Index'])->name('phobias');
    Route::get('/random', [PhobiaController::class, 'Random']);
    Route::get('/phobia/create', [PhobiaController::class, 'Make']);
    Route::get('/phobia/{id}', [PhobiaController::class, 'Show'])->name('phobia.show');
    Route::get('/phobia/{id}/edit', [PhobiaController::class, 'edit']);
    Route::post('/phobia/{id}', [PhobiaController::class, 'update']);
    Route::delete('/phobia/{id}', [PhobiaController::class, 'delete']);
    Route::post('/phobia', [PhobiaController::class, 'create']);
    Route::get('/phobias/search', [PhobiaController::class, 'search']);

    Route::get('/pins/search', [PinController::class, 'search']);
    Route::post('/pin', [PinController::class, 'newPin']);
    Route::get('/pin', [PinController::class, 'Index']);
    Route::post('/pin/delete', [PinController::class, 'delete']);

    Route::post('/comment', [CommentController::class, 'store']);
    Route::post('/comment/delete', [CommentController::class, 'delete']);
});



require __DIR__.'/auth.php';
