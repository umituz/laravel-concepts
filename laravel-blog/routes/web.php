<?php

use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\UrlController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [UrlController::class, 'homepage'])->name('homepage');
Route::post('/post/{id}/addPostVote', [UrlController::class, 'addPostVote'])->name('addPostVote');
Route::delete('/post/{id}/removePostVote', [UrlController::class, 'removePostVote'])->name('removePostVote');
Route::get('/post/{slug}', [UrlController::class, 'postDetail'])->name('postDetail');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [PostController::class, 'index'])->name('admin')->middleware('permission:posts.index');
    Route::get('/writer', [PostController::class, 'index'])->name('writer')->middleware('permission:posts.index');
    Route::group(['prefix' => 'posts'], function () {
//        Route::get('/', [PostController::class, 'index'])->name('posts.index')->middleware('permission:posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:posts.create');
        Route::post('/', [PostController::class, 'store'])->name('posts.store')->middleware('permission:posts.create');
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('permission:posts.edit');
        Route::put('/{id}/edit', [PostController::class, 'update'])->name('posts.update')->middleware('permission:posts.edit');
        Route::delete('/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('permission:posts.destroy');
        Route::put('/{id}/publish', [PostController::class, 'publish'])->name('posts.publish')->middleware('permission:posts.publish');
        Route::put('/{id}/unpublish', [PostController::class, 'unpublish'])->name('posts.unpublish')->middleware('permission:posts.unpublish');
    });
});
