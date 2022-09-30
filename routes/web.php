<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('/articles', ArticleController::class)->except(['edit', 'update']);

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
    Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::resource('/profiles', ProfileController::class)->except(['show', 'store', 'create', 'destroy']);

    Route::get('/2y$10$KMfnFfmsOTiehOIbJIyKesxrcvkqpl1aU9vlsqunTLcsgDug/{n}', [ArticleController::class, 'qr'])->name('qr');

});

Auth::routes(['verify' => true]);
