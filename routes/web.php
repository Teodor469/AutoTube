<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {

    Route::post('', [VideoController::class, 'store'])->name('store');

    Route::get('/{video}', [VideoController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{video}/edit', [VideoController::class, 'edit'])->name('edit');

        Route::put('/{video}', [VideoController::class, 'update'])->name('update');

        Route::delete('/{video}', [VideoController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/register', [AuthController::class, 'register'])->name('register.form');

Route::post('/register', [AuthController::class, 'store'])->name('register.submit');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
