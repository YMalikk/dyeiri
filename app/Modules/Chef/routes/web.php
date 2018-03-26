<?php

Route::group(['module' => 'Chef', 'middleware' => ['web'], 'namespace' => 'App\Modules\Chef\Controllers'], function() {

    Route::resource('Chef', 'ChefController');
    Route::get('/chef/{id}', 'ChefController@showChefProfil')->name('showChefProfil');
    Route::post('/reviewChef/{id}', 'ChefController@handleChefReview')->name('handleChefReview'); // middleware client

});

Route::group(['module'=> 'User','middleware'=>'chef','namespace'=>'App\Modules\Chef\Controllers'],function () {

    Route::get('/me', 'ChefController@showChefProfile')->name('showChefProfile');
    Route::get('/complete', 'ChefController@showChefRegisterStepTwo')->name('showChefRegisterStepTwo');
});
