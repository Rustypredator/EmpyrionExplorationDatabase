<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LocationController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('location')->group(function () {
        Route::get('/', [LocationController::class, 'index'])->name('frontend.locations');
        Route::get('/create/{parentId?}', [LocationController::class, 'create'])->name('frontend.location.create');
        Route::get('/{location}', [LocationController::class, 'show'])->name('frontend.location.show');
        Route::get('/{location}/edit', [LocationController::class, 'edit'])->name('frontend.location.edit');
    });
});