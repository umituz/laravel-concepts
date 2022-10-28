<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/secured', function () {
    return "Secured zone!";
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
