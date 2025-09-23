<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DistanceController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('distance')->group(function () {
        Route::get('/', [DistanceController::class, 'index'])->name('frontend.distances');
        Route::get('/create', [DistanceController::class, 'create'])->name('frontend.distance.create');
        Route::get('/{distance}', [DistanceController::class, 'show'])->name('frontend.distance.show');
        Route::get('/{distance}/edit', [DistanceController::class, 'edit'])->name('frontend.distance.edit');
    });
});