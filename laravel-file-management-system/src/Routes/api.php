<?php

Route::middleware('auth:api')->group(function () {
	Route::get('/index', 'GalleryApiController@index');
});