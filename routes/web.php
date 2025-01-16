<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');

    Route::get('/show/{id}', [BlogController::class, 'show'])->name('show');

    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/', [BlogController::class, 'store'])->name('store');

    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BlogController::class, 'update'])->name('update');

    Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
});
