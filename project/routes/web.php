<?php

Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
    Route::post('auth/logout', 'AuthController@logout');
    Route::delete('items/clear', 'ItemsController@clear');
    Route::resource('items', 'ItemsController');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

