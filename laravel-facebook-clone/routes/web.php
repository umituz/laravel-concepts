<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/{any}', 'AppController@index')
    ->where('any','.*')
    ->middleware('auth')
    ->name('home');
