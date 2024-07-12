<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;

Auth::routes();

Route::get('/home', [PostController::class, 'index'])->name('home');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::post('/posts/{post}/comments', [PostController::class, 'addComment'])->name('posts.addComment')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/comments/{comment}/edit', [PostController::class, 'editComment'])->name('comments.edit')->middleware('auth');
Route::put('/comments/{comment}', [PostController::class, 'updateComment'])->name('comments.update')->middleware('auth');
Route::delete('/comments/{comment}', [PostController::class, 'destroyComment'])->name('comments.destroy')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');