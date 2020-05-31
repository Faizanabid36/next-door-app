<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'RouteViewsController@login_page')->name('login');



Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth' ], function(){
    Route::get('/dashboard' , 'RouteViewsController@user_dashboard')->name('dashboard');
    Route::get('/admin-dashboard' , 'RouteViewsController@main_dashboard')->name('admin-dashboard');
    Route::get('/public_agencies','HomeController@public_agencies')->name('public_agencies');
    Route::post('/delete_user','HomeController@delete_user')->name('delete_user');
});


Auth::routes();

Route::get('/list' , 'HomeController@list')->name('neighour_list');

// category
Route::get('/add_category' , 'RouteViewsController@add_cat')->name('add_category');
Route::post('/add_category' , 'CategoryController@addcategory')->name('add_category');
Route::get('/view_category' , 'CategoryController@viewcategory')->name('view_category');
Route::get('/view_category/delete_category/{id}' , 'CategoryController@deletecategory');
Route::get('/view_category/edit_category/{id}' , 'CategoryController@editcategory');
Route::post('/view_category/edit_category/{id}' , 'CategoryController@editcategory');




