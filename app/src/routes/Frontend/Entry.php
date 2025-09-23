<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\EntryController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::prefix('entry')->group(function () {
        Route::get('/', [EntryController::class, 'index'])->name('frontend.entries');
        Route::get('/create/{parentId?}', [EntryController::class, 'create'])->name('frontend.entry.create');
        Route::get('/{entry}', [EntryController::class, 'show'])->name('frontend.entry.show');
        Route::get('/{entry}/edit', [EntryController::class, 'edit'])->name('frontend.entry.edit');
    });
});