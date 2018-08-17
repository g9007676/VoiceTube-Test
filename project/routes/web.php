<?php

Route::post('signup', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('token', 'AuthController@check');
Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('auth/user', 'AuthController@user');
    Route::delete('items/clear', 'ItemsController@clear');
    Route::resource('items', 'ItemsController');
});

Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');

