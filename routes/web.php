<?php

Route::group(['prefix'=>'admin', 'namespace'=>'admin', 'middleware' => 'auth'], function(){
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    Route::get('/', function(){
    })->name('admin');
});

Route::get('/', function () {
    return view('welcome');
});
