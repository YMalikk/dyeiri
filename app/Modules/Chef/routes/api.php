<?php

Route::group(['module' => 'Chef', 'middleware' => ['api'], 'namespace' => 'App\Modules\Chef\Controllers'], function() {

    Route::resource('Chef', 'ChefController');

});
