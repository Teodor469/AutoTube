<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');

Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');

Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');

Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
