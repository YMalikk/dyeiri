<?php

Route::group(['module' => 'Chef', 'middleware' => ['web'], 'namespace' => 'App\Modules\Chef\Controllers'], function() {

    Route::resource('Chef', 'ChefController');

});

Route::group(['module'=> 'User','middleware'=>'chef','namespace'=>'App\Modules\Chef\Controllers'],function () {

    Route::get('/me', 'ChefController@showChefProfile')->name('showChefProfile');
    Route::get('/complete', 'ChefController@showChefRegisterStepTwo')->name('showChefRegisterStepTwo');
});
