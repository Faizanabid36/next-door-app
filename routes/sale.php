<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'SaleItemController@main')->name('ecommerce');
Route::get('/single' , 'SaleItemController@single')->name('single');
Route::post('/add_item', 'SaleItemController@add')->name('add_item');

