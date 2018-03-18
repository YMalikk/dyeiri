<?php

Route::group(['module' => 'Chef', 'middleware' => ['web'], 'namespace' => 'App\Modules\Chef\Controllers'], function() {

    Route::resource('Chef', 'ChefController');

});
