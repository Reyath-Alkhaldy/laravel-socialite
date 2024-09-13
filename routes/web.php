<?php

use App\Http\Controllers\SocialiteINfoController;
use App\Http\Controllers\SocialiteLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('news', [SocialiteINfoController::class, 'showArticles'])->name('socialite.showArticles');

Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('/{provider}/redirect', [SocialiteLoginController::class, 'redirect'])->name('socialite.redirect');
    Route::get('/{provider}/callback', [SocialiteLoginController::class, 'callback'])->name('socialite.callback');
    Route::get('/{provider}/user', [SocialiteINfoController::class, 'index'])->name('socialite.user');
});
