<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post}/comments', [PostController::class, 'addComment'])->name('posts.addComment');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/comments/{comment}/edit', [PostController::class, 'editComment'])->name('comments.edit');
Route::put('/comments/{comment}', [PostController::class, 'updateComment'])->name('comments.update');
Route::delete('/comments/{comment}', [PostController::class, 'destroyComment'])->name('comments.destroy');
