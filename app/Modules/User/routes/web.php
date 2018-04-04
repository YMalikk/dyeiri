<?php

Route::group(['module' => 'User', 'middleware' => ['web'], 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/logout', ['uses' => 'LoginController@logout', 'as' => 'logout']);
    Route::get('/chef_register', 'RegisterController@showChefRegister')->name('showChefRegister');
    Route::get('/client_register', 'RegisterController@showClientRegister')->name('showClientRegister');
    Route::post('/handleChefRegister', 'RegisterController@handleChefRegister')->name('handleChefRegister');
    Route::post('/handleConnection', 'LoginController@handleConnection')->name('handleConnection');
    Route::get('/user/verify/{token}', 'RegisterController@verifyUser');
    Route::get('/login',['uses'=>'LoginController@showLogin','as'=>'showLogin']);


    Route::get('/subscriptionProvider/{provider}', 'LoginController@authenticate')->name('authenticate');
    Route::post('/subscriptionProviderType', 'LoginController@handleSubscriptionProviderType')->name('handleSubscriptionProviderType');
    Route::get('login/{provider}/callback', 'LoginController@loginProvider')->name('loginProvider')->where(['provider' => 'facebook|google']);
    Route::get('/change_user/{currentUser}',['uses'=>'UserController@changeCurrentUser','as'=>'changeCurrentUser']);


    Route::get('/admin', 'LoginController@showAdminLogin')->name('showAdminLogin');

    Route::post('/handleAdminLogin', 'LoginController@handleAdminLogin')->name('handleAdminLogin');
});


Route::group(['module'=>'User','middleware'=>'web','namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/messages', 'UserController@showMessages')->name('showMessages')->middleware('auth');
    Route::post('/sendMessage',['uses'=>'UserController@handleSendMessage','as'=>'handleSendMessage']);
    Route::post('/deleteMessage/{id}',['uses'=>'UserController@handleDeleteMessage','as'=>'handleDeleteMessage']);
    Route::post('/restoreMessage/{id}',['uses'=>'UserController@handleRestoreMessage','as'=>'handleRestoreMessage']);
    Route::post('/readMessage',['uses'=>'UserController@handleReadMessage','as'=>'handleReadMessage']);

});

Route::group(['module' => 'User','middleware'=>'client', 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/profile', 'UserController@showProfile')->name('showProfile');
    Route::post('/profile', 'UserController@editProfile')->name('editProfile');
});

Route::group(['module' => 'User','middleware'=>'admin', 'namespace' => 'App\Modules\User\Controllers'], function() {

    Route::get('/admin/dashboard', 'UserController@showDashboard')->name('showDashboard');
    Route::get('/admin/messages', 'UserController@showAdminMessages')->name('showAdminMessages');
    Route::get('/admin/chefs', 'UserController@showChefList')->name('showChefList');
    Route::get('/admin/clients', 'UserController@showClientList')->name('showClientList');
    Route::post('/admin/sendMessage', 'UserController@handleAdminSendMessage')->name('handleAdminSendMessage');
});

