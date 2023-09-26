<?php

use App\Controllers\PostController;
use App\Core\Route\Route;

Route::get('posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('store', [PostController::class, 'store'])->name('posts.show');