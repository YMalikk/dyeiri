<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);
    Route::get('/profile',['uses'=>'UserController@showProfile','as'=>'showProfile']);
});
