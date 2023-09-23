<?php

use App\Controllers\PostController;
use App\Core\Route\Route;

Route::get('posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');