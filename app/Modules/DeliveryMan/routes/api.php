<?php

Route::group(['module' => 'DeliveryMan', 'middleware' => ['api'], 'namespace' => 'App\Modules\DeliveryMan\Controllers'], function() {

    Route::resource('DeliveryMan', 'DeliveryManController');

});
