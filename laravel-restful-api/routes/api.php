<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.basic')->get('/user-basic', function (Request $request) {
    return $request->user();
});

Route::get('/categories/custom1', 'Api\CategoryController@custom1')->name('categories.custom1')->middleware('auth:api');
Route::get('/categories/custom2', 'Api\CategoryController@custom2')->name('categories.custom2');
Route::get('/products/custom1', 'Api\ProductController@custom1')->name('products.custom1');
Route::get('/products/custom2', 'Api\ProductController@custom2')->name('products.custom2');
Route::get('/products/custom3', 'Api\ProductController@custom3')->name('products.custom3');
Route::get('/products/custom4', 'Api\ProductController@custom4')->name('products.custom4');
Route::get('/products/listWithCategories', 'Api\ProductController@listWithCategories')->name('products.listWithCategories');
Route::get('/users/custom1', 'Api\UserController@custom1')->name('users.custom1');
Route::get('/users/custom2', 'Api\UserController@custom2')->name('users.custom2');
Route::get('/users/custom3', 'Api\UserController@custom3')->name('users.custom3');
Route::get('/users/custom4', 'Api\UserController@custom4')->name('users.custom4');

Route::apiResource('/users', 'Api\UserController');
Route::apiResource('/products', 'Api\ProductController');
Route::apiResource('/categories', 'Api\CategoryController');


Route::post('/auth/login', 'Api\AuthController@login')->name('auth.login');

//Route::apiResources([
//    'products' => 'Api\ProductController',
//    'users' => 'Api\UserController'
//]);

Route::middleware('apiToken')->group(function () {


    Route::get('/auth/token', function (Request $request) {
        $user = $request->user();

        return response()->json([
            'full_name' => $user->first_name . ' ' . $user->last_name,
            'access_token' => $user->api_token,
            'time' => time()
        ]);
    });

});
