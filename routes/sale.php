<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'EcommerceController@main')->name('ecommerce');
Route::get('/single' , 'EcommerceController@single')->name('single');

