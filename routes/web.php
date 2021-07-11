<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', 'WelcomeController@index');

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
        ->replaceLast('UZ', 'Kral');

    dd($newString);

});

Route::get('/translatable', 'PostController@translatable');
Route::post('/upload', 'User\ProfileController@upload')->name('user.profile.upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cache-file', 'CacheController@tagFile');

Route::get('/cdn', 'GoogleCdnController@index');

Route::get('/jobs', 'JobsController@index');

Route::get('/custom-jobs', 'JobsController@customJob');

Route::get('/our-macro', 'MacroableController@ourMacro');

Route::group(['prefix' => 'export'], function () {
    Route::get('/users/collection-method-1', 'ExcelController@userCollectionMethod1');
    Route::get('/users/collection-method-2', 'ExcelController@userCollectionMethod2');
    Route::get('/users/collection-method-3', 'ExcelController@userCollectionMethod3');
});
