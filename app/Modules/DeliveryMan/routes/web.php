<?php

Route::group(['module' => 'DeliveryMan', 'middleware' => ['web'], 'namespace' => 'App\Modules\DeliveryMan\Controllers'], function() {

    Route::resource('DeliveryMan', 'DeliveryManController');

});
