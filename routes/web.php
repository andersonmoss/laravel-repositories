<?php

Route::get('admin', function(){

})->name('admin');

Route::any('admin/categories/search', 'Admin\CategoryController@search')->name('categories.search');

Route::resource('admin/categories', 'Admin\CategoryController');

Route::get('/', function () {
    return view('welcome');
});
