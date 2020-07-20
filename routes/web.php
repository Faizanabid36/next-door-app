<?php

use Illuminate\Support\Facades\Route;
//
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

/**
 * --------------------------------
 * Admin Routes without prefix
 * --------------------------------
 */

Route::group(['middleware' => 'auth' ], function(){
    Route::get('/home', 'RouteViewsController@login_page')->name('login');
    Route::get('/dashboard' , 'RouteViewsController@user_dashboard')->name('dashboard');
    Route::get('/admin-dashboard' , 'RouteViewsController@main_dashboard')->name('admin-dashboard');
    Route::get('/public_agencies','HomeController@public_agencies')->name('public_agencies');
    Route::post('/delete_user', 'HomeController@delete_user')->name('delete_user');
    Route::get('/neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('agents_list','HomeController@agents_list')->name('agents_list');
    Route::get('user/{id}','UserController@show_user_details')->name('show_user_details');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    /**
     * ----------------------------
     * Categories Routes
     * ----------------------------
     **/
    Route::get('/add_category', 'RouteViewsController@add_cat')->name('add_category');
    Route::post('/add_category', 'CategoryController@addcategory')->name('add_category');
    Route::get('/view_category', 'CategoryController@viewcategory')->name('view_category');
    Route::get('/view_category/delete_category/{id}', 'CategoryController@deletecategory');
    Route::post('/view_category/edit_category', 'CategoryController@editcategory')->name('edit_category');

    /**
     * ----------------------------
     * Profile Setting Routes
     * ----------------------------
     **/
    Route::get('/edit_profile' , 'RouteViewsController@account')->name('edit_profile');
    Route::post('/update_user/{id}','UserController@updateuser')->name('update_user');
    Route::post('/changePassword/{id}','UserController@changePassword')->name('change_password');
    Route::post('/update_family/{id}','UserController@update_family')->name('update_family');
    Route::post('update_user_extras/{id}','UserController@update_user_extras')->name('update_user_extras');
    Route::post('edit_family/{id}','UserController@edit_family')->name('edit_family');
    Route::get('delete_family/{id}','UserController@delete_family')->name('delete_family');
    Route::post('get_location/','UserController@update_address')->name('update_postal');



    // profile
    Route::get('/home/view_profile/{id}', 'HomeController@view_profile')->name('view_profile');
    //email
    Route::get('/email','EmailConfigController@send_email')->name('email');
});


/**
 * -----------------------------
 * Admin Routes with prefix
 * -----------------------------
 */

Route::name('admin.')->middleware('auth')->prefix('admin')->group(function () {
    Route::get('neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('/create_agent', 'PublicAgentController@agent')->name('create');
    Route::post('/create_agent', 'PublicAgentController@createagent')->name('create_agent');
});


Route::get('/sale' , 'SaleItemController@item')->name('item');
Route::get('/img' , 'SaleItemsImageController@itemimage')->name('img');

// ecommerce
Route::get('/single' , 'EcommerceController@single')->name('single');


/**
 * ---------------------------------
 * Login-Register Routes
 * ---------------------------------
 */
Route::get('/auth/register' , 'RouteViewsController@signup')->name('signup2');
Route::get('/auth/register_continue' , 'UserController@register_continue')->name('register_continue');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');




Route::view('test','layouts.salika.index');




