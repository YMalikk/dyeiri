<?php

Route::group(['module' => 'Blog', 'middleware' => ['web'], 'namespace' => 'App\Modules\Blog\Controllers'], function() {

    Route::resource('Blog', 'BlogController');

});

Route::group(['module' => 'Blog','middleware'=>'admin', 'namespace' => 'App\Modules\Blog\Controllers'], function() {

    Route::get('admin/addBlog','BlogController@showAddBlog')->name('showAddBlog');
    Route::post('/admin/handleAddBlog', 'BlogController@handleAddBlog')->name('handleAddBlog');
    Route::get('admin/blogs','BlogController@showBlogList')->name("showBlogList");
    Route::get('admin/blog/disabled/{id}','BlogController@handleDisableBlog')->name("handleDisableBlog");
    Route::get('admin/blog/enable/{id}','BlogController@handleEnableBlog')->name("handleEnableBlog");
});
