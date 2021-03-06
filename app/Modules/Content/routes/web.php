<?php

Route::group(['module' => 'Content', 'middleware' => ['web'], 'namespace' => 'App\Modules\Content\Controllers'], function() {

    Route::get('/', 'ContentController@showHome')->name('showHome');
    Route::get('/faq', 'ContentController@showFaq')->name('showHireWalter');
    Route::post('/contact', 'ContentController@showContact')->name('handleContact');
    Route::get('/showSalesTerms',['uses'=>'ContentController@showSalesTerms','as'=>'showSalesTerms']);
    Route::post('/searchFood', 'ContentController@handleSearchFood')->name('handleSearchFood');
    Route::get('/showBlogs', 'ContentController@showBlogs')->name('showBlogs');
    Route::get('/showBlog/{id}', 'ContentController@showBlog')->name('showBlog');
    Route::get('/faq', 'ContentController@showFAQ')->name('showFAQ');
});
