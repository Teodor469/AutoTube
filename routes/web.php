<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/landing-page', [DashboardController::class, 'landingPage'])->name('landing-page');

Route::get('/submit-video', [DashboardController::class, 'uploadVideos'])->name('videos.upload');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('videos', VideoController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('videos', VideoController::class);


Route::get('/register', [AuthController::class, 'register'])->name('register.form');

Route::post('/register', [AuthController::class, 'store'])->name('register.submit');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
