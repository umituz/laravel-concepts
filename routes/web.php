<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/component', function () {
    return view('component', [
        'info' => 'I am AWESOME!'
    ]);
});

Route::get('/http/get', 'HttpController@get');
Route::get('/http/post', 'HttpController@post');

Route::get('/fluent', function () {

    $string = "Ümit UZ   ";

    $newString = Str::of($string)
        ->trim()
    ->replaceLast('UZ','Kral');

    dd($newString);

});
