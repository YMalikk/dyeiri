<?php

Route::group(['module' => 'Order', 'middleware' => ['web'], 'namespace' => 'App\Modules\Order\Controllers'], function() {

    Route::resource('Order', 'OrderController');
    Route::post('/showOrderSummary/{id}', 'OrderController@showOrderSummary')->name('showOrderSummary'); // middleware client
    Route::post('/handleOrderSummary/{id}', 'OrderController@handleOrder')->name('handleOrder'); // middleware client
});
