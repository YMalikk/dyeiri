<?php

Route::group(['module' => 'Chef', 'middleware' => ['web'], 'namespace' => 'App\Modules\Chef\Controllers'], function() {

    Route::resource('Chef', 'ChefController');
    Route::get('/chef/{id}', 'ChefController@showChefSearchedProfile')->name('showChefSearchedProfile');


});

Route::group(['module'=> 'User','middleware'=>'chef','namespace'=>'App\Modules\Chef\Controllers'],function () {

    Route::get('/me', 'ChefController@showChefProfile')->name('showChefProfile');
    Route::get('/complete', 'ChefController@showChefRegisterStepTwo')->name('showChefRegisterStepTwo');
    Route::post('/complete', 'ChefController@handleCompleteRegisterChef')->name('handleCompleteRegisterChef');
    Route::get('/confirmOrderChef/{id}', 'ChefController@confirmOrderChef')->name('confirmOrderChef');
    Route::get('/denyOrderChef/{id}', 'ChefController@denyOrderChef')->name('denyOrderChef');
    Route::get('/confirmDishReadyChef/{id}', 'ChefController@confirmDishReadyChef')->name('confirmDishReadyChef');
    Route::post('/handleEditChefProfile',['uses'=>'ChefController@handleEditChefProfile','as'=>'handleEditChefProfile']);
    Route::post('/handleChefChangeImage',['uses'=>'ChefController@handleChefChangeImage','as'=>'handleChefChangeImage']);
    Route::post('/handleChefChangeCover',['uses'=>'ChefController@handleChefChangeCover','as'=>'handleChefChangeCover']);
    Route::post('/handleAddGalleryImage',['uses'=>'ChefController@handleAddGalleryImage','as'=>'handleAddGalleryImage']);
    Route::post('/handleAddKitchenImage',['uses'=>'ChefController@handleAddKitchenImage','as'=>'handleAddKitchenImage']);
    Route::get('/handleGalleryDeleteImage/{id}',['uses'=>'ChefController@handleGalleryDeleteImage','as'=>'handleGalleryDeleteImage']);
    Route::get('/handleKitchenDeleteImage/{id}',['uses'=>'ChefController@handleKitchenDeleteImage','as'=>'handleKitchenDeleteImage']);


});

Route::group(['module'=> 'User','middleware'=>'client','namespace'=>'App\Modules\Chef\Controllers'],function () {

    Route::post('/reviewChef/{id}', 'ChefController@handleChefReview')->name('handleChefReview');
    Route::get('/denyOrderClient/{id}', 'ChefController@denyOrderClient')->name('denyOrderClient');
});
