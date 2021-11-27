<?php

Route::view('/', 'welcome');

Route::get('/secured', function () {
    return "Secured zone!";
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
