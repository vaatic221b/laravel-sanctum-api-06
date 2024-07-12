<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebPostController;

Auth::routes();

Route::get('/', [WebPostController::class, 'index'])->name('home');
Route::get('/posts/create', [WebPostController::class, 'create'])->name('posts.create');
Route::post('/posts', [WebPostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [WebPostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post}/comments', [WebPostController::class, 'addComment'])->name('posts.addComment');
Route::get('/posts/{post}/edit', [WebPostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [WebPostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [WebPostController::class, 'destroy'])->name('posts.destroy');
Route::get('/comments/{comment}/edit', [WebPostController::class, 'editComment'])->name('comments.edit');
Route::put('/comments/{comment}', [WebPostController::class, 'updateComment'])->name('comments.update');
Route::delete('/comments/{comment}', [WebPostController::class, 'destroyComment'])->name('comments.destroy');
