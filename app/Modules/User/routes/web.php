<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);
    Route::get('/chef_register', 'RegisterController@showChefRegister')->name('showChefRegister');
    Route::post('/handleChefRegister', 'RegisterController@handleChefRegister')->name('handleChefRegister');
    Route::post('/handleConnection', 'LoginController@handleConnection')->name('handleConnection');
    Route::get('/user/verify/{token}', 'RegisterController@verifyUser');

});


Route::group(['module' => 'User','middleware'=>'client', 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/profile', 'UserController@showProfile')->name('showProfile');

});


Route::group(['module'=> 'User','middleware'=>'chef','namespace'=>'App\Modules\User\Controllers'],function () {

    Route::get('/espace', 'UserController@showProfile')->name('showProfile');

});