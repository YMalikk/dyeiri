<?php

Route::group(['module' => 'Food', 'middleware' => ['api'], 'namespace' => 'App\Modules\Food\Controllers'], function() {

    Route::resource('Food', 'FoodController');

});
