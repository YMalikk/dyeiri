<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);
    Route::get('/profile',['uses'=>'UserController@showProfile','as'=>'showProfile']);
    Route::get('/chefSubscription', 'UserController@showChefSubscription')->name('showChefSubscription');
    Route::get('/profileChef', 'UserController@showProfileChef')->name('showProfileChef');
});

Route::group(['module' => 'User', 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::post('/handleChefSubscription', 'RegisterController@handleChefRegister')->name('handleChefRegister');
    Route::post('/handleConnection', 'LoginController@handleConnection')->name('handleConnection');
    Route::get('/user/verify/{token}', 'RegisterController@verifyUser');
});
