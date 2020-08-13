<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'SaleItemController@main')->name('ecommerce');
Route::get('/{category}' , 'SaleItemController@byCategory')->name('sale_and_free.byCategory');
Route::get('/{category}/{id}' , 'SaleItemController@itemByCategory')->name('sale_and_free.byItemInCategory');
Route::get('/single' , 'SaleItemController@single')->name('single');
Route::post('/add_item', 'SaleItemController@add')->name('add_item');

