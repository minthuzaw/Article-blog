<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
    Route::delete('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::resource('/profiles', ProfileController::class)->except(['show', 'store', 'create', 'destroy']);
});
Route::resource('/articles', ArticleController::class)->except(['edit', 'update']);

Route::get('/test/{q}', [TicketController::class, 'qr'])->name('qr');
Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');
Route::post('/tickets', [TicketController::class, 'check'])->name('ticket.check');
Auth::routes(['verify' => true]);
