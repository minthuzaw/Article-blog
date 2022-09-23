<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//Route::get('/articles', [HomeController::class, 'index'])->name('articles.index');

Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::delete('/articles/delete/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/comments/delete/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::resource('/profiles', ProfileController::class)->except(['show', 'store', 'create', 'destroy']);
Auth::routes();
