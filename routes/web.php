<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\YouTubeController;
use Illuminate\Support\Facades\Route;

Route::get('/landingPage', [DashboardController::class, 'landingPage'])->name('landingPage');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [YouTubeController::class, 'index'])->name('dashboard.youtube');

Route::get('/oauth2callback', [YouTubeController::class, 'oauthCallback'])->name('oauthCallback');

Route::group(['middleware' => ['auth']], function () { // May need to update the group in order to share the same namespace for the controller

    Route::get('/submitVideo', [DashboardController::class, 'uploadVideos'])->name('videos.upload');

    Route::get('/videosDue', [DashboardController::class, 'unpublishedVideos'])->name('videos.due');

    Route::get('/videosPublished', [DashboardController::class, 'publishedVideos'])->name('videos.published');

    Route::resource('videos', VideoController::class)->except(['index', 'create']);
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register.form');

    Route::post('/register', 'store')->name('register.submit');

    Route::get('/login', 'login')->name('login');

    Route::post('/login', 'authenticate')->name('login.submit');

    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/react', function () {
    return view('react');
});
