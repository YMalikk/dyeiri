<?php

Route::group(['module' => 'Food', 'middleware' => ['web'], 'namespace' => 'App\Modules\Food\Controllers'], function() {

    Route::resource('Food', 'FoodController');
    Route::get('/showFood/{id}', 'FoodController@showFood')->name('showFood');
    Route::post('/foodReview/{id}', 'FoodController@handleFoodReview')->name('handleFoodReview');
    Route::post('/chefAddFood', 'FoodController@handleChefAddFood')->name('handleChefAddFood');
});
