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

Route::group(['middleware' => 'auth' ], function(){
    Route::get('/home', 'RouteViewsController@login_page')->name('login');
    Route::get('/dashboard' , 'RouteViewsController@user_dashboard')->name('dashboard');
    Route::get('/admin-dashboard' , 'RouteViewsController@main_dashboard')->name('admin-dashboard');
    Route::get('/public_agencies','HomeController@public_agencies')->name('public_agencies');
    Route::post('/delete_user', 'HomeController@delete_user')->name('delete_user');
    Route::get('/neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('agents_list','HomeController@agents_list')->name('agents_list');
});
Auth::routes();

//Category Group
Route::group(['middleware' => 'auth'], function () {
    // category
    Route::get('/add_category', 'RouteViewsController@add_cat')->name('add_category');
    Route::post('/add_category', 'CategoryController@addcategory')->name('add_category');
    Route::get('/view_category', 'CategoryController@viewcategory')->name('view_category');
    Route::get('/view_category/delete_category/{id}', 'CategoryController@deletecategory');
    Route::post('/view_category/edit_category', 'CategoryController@editcategory')->name('edit_category');

});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('agents_list','HomeController@delete_user')->name('agents_list');
});

//Admin create user
Route::get('/create_agent', 'PublicAgentController@agent')->name('create');
Route::post('/create_agent', 'PublicAgentController@createagent')->name('create_agent');






