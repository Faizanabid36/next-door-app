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
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Auth::routes();


// admin routes

Route::get('/list' , 'HomeController@list')->name('neighour_list');
Route::get('/list/{id}' , 'HomeController@delete_user')->name('delete');

