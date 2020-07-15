<?php

Route::any('admin/products/search', 'Admin\ProductController@search')->name('products.search');

Route::resource('admin/products', 'Admin\ProductController');

Route::get('admin', function(){
})->name('admin');

Route::any('admin/categories/search', 'Admin\CategoryController@search')->name('categories.search');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::get('/', function () {
    return view('welcome');
});
