<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostsController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => 'posts', 'middleware' => 'auth:api'], function () {
    Route::get('/', [PostsController::class, 'index'])->middleware('permission:posts.index');
    Route::get('/export', [PostsController::class, 'export'])->middleware('permission:posts.export');
    Route::post('/', [PostsController::class, 'store'])->middleware('permission:posts.create');
    Route::put('/{id}', [PostsController::class, 'update'])->middleware('permission:posts.edit');
    Route::delete('/{id}', [PostsController::class, 'destroy'])->middleware('permission:posts.destroy');
    Route::put('/{id}/publish', [PostsController::class, 'publish'])->middleware('permission:posts.publish');
    Route::put('/{id}/unpublish', [PostsController::class, 'unpublish'])->middleware('permission:posts.unpublish');
});
