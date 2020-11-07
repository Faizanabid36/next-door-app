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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', 'RouteViewsController@login_page')->name('login');
//    Route::get('/feed/news-feed', 'HomeController@feed')->name('feed');
//    Route::get('/dashboard/', 'PostController@index')->name('dashboard');
    Route::get('/my-dashboard', 'RouteViewsController@feed')->name('home');
    Route::get('/admin-dashboard', 'RouteViewsController@main_dashboard')->name('admin-dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/public_agencies', 'HomeController@public_agencies')->name('public_agencies');
    Route::post('/delete_user', 'HomeController@delete_user')->name('delete_user');
    Route::get('/neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('admin/agents_list', 'HomeController@agents_list')->name('agents_list');
});


Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {

    /**
     * ----------------------------
     * Profile Setting Routes
     * ----------------------------
     **/
    Route::get('/edit_profile', 'RouteViewsController@account')->name('edit_profile');
    Route::get('/edit_profile/change_password', 'RouteViewsController@account_1')->name('change-password');
    Route::get('/edit_profile/user_extras', 'RouteViewsController@account_2')->name('user-extras');
    Route::post('/update_user/{id}', 'UserController@updateuser')->name('update_user');
    Route::post('/changePassword/{id}', 'UserController@changePassword')->name('change_password');
    Route::post('/update_family/{id}', 'UserController@update_family')->name('update_family');
    Route::post('update_user_extras/{id}', 'UserController@update_user_extras')->name('update_user_extras');
    Route::post('edit_family/{id}', 'UserController@edit_family')->name('edit_family');
    Route::get('delete_family/{id}', 'UserController@delete_family')->name('delete_family');
    Route::post('get_location/', 'UserController@update_address')->name('update_postal');


    // profile
    Route::get('/profile/{id}', 'HomeController@view_profile')->name('view_profile');
    //email
    Route::get('/email', 'EmailConfigController@send_email')->name('email');

    Route::post('readNotifications', 'HomeController@read_notifications');
});


/**
 * -----------------------------
 * Admin Routes with prefix
 * -----------------------------
 */

Route::name('admin.')->middleware('auth')->prefix('admin')->group(function () {

    /**
     * Create Agent
     **/
    Route::get('neighbours', 'HomeController@neighbours_list')->name('neighbours');
    Route::get('/create_agent', 'PublicAgentController@agent')->name('create');
    Route::post('/create_agent', 'PublicAgentController@createagent')->name('create_agent');

    /**
     * For Sale and Free Categories
     **/
    Route::get('/add_category', 'RouteViewsController@add_cat')->name('add_category');
    Route::post('/add_category', 'CategoryController@addcategory')->name('add_category');
    Route::get('/view_category', 'CategoryController@viewcategory')->name('view_category');
    Route::get('/view_category/delete_category/{id}', 'CategoryController@deletecategory');
    Route::post('/view_category/edit_category', 'CategoryController@editcategory')->name('edit_category');

    /**
     * Business Categories Resource Route
     **/
    Route::resource('business_categories', 'BusinessCategoryController');
    Route::post('edit_business_category', 'BusinessCategoryController@edit_business_category')->name('edit_business_category');
    Route::get('business_sub_categories', 'BusinessSubCategoryController@index')->name('business_sub_categories.index');
    Route::get('create/business_sub_categories', 'BusinessSubCategoryController@create_sub_category')->name('business_sub_categories.create');
    Route::post('create_business_sub_categories', 'BusinessSubCategoryController@store_sub_category')->name('business_sub_categories.store');
    Route::post('update_business_sub_categories', 'BusinessSubCategoryController@update')->name('business_sub_categories.update');
    Route::post('delete_business_sub_categories','BusinessSubCategoryController@delete')->name('business_sub_categories.delete');
});



/**
 *-----------------------------
 * Business page Routes
 * ----------------------------
 */
Route::name('business.')->middleware(['auth', 'verified'])->prefix('business')->group(function () {
    Route::get('my_business', 'BusinessController@my_business')->name('my_business');
    Route::get('list', 'BusinessController@index')->name('list');
    Route::get('list/{b_category_slug}', 'BusinessController@list_by_category')->name('list_by_category');
    Route::get('view/page/{business_id}', 'BusinessController@view_business_page')->name('view_business_page');
    Route::get('create/page', 'BusinessController@create_business_page')->name('create_business_page');
    Route::get('edit/page/{business}', 'BusinessController@edit_business_page')->name('edit_business_page');
    Route::post('store/page', 'BusinessController@store_business_page')->name('store_business_page');
    Route::post('update/page/{business}', 'BusinessController@update_business_page')->name('update_business_page');
    Route::get('delete/page/{business}', 'BusinessController@delete_business_page')->name('delete_business_page');
    Route::get('settings/gallery/{business_id}', 'BusinessController@gallery_settings')->name('gallery_settings');
    Route::get('view/gallery/{business_id}', 'BusinessController@view_gallery')->name('view_gallery');
    Route::post('settings/store_business_image', 'BusinessController@store_business_image')->name('store_business_image');
    Route::get('settings/delete_business_image/{image_id}', 'BusinessController@delete_business_image')->name('delete_business_image');

});
/**
 * -----------------------------
 * Admin Ads Routes
 * -----------------------------
 */
Route::resource('ads', 'AdminAdController')->middleware(['auth', 'verified']);
Route::post('update_ad', 'AdminAdController@update_ad')->middleware(['auth', 'verified'])->name('ads.update_ad');


/**
 *-----------------------------
 * Reviews Routes
 * ----------------------------
 */
Route::name('reviews.')->middleware(['auth', 'verified'])->prefix('reviews')->group(function () {
    Route::post('store_review', 'UserBusinessRecommendationController@store')->name('store_review');
    Route::get('delete_review/{id}', 'UserBusinessRecommendationController@delete')->name('delete_review');
    Route::get('add_recommendation/{id}', 'UserBusinessRecommendationController@add_recommendation')->name('add_recommendation');
    Route::get('remove_recommendation/{id}', 'UserBusinessRecommendationController@remove_recommendation')->name('remove_recommendation');
});

/**
 *-----------------------------
 * Lost and Found Routes
 * ----------------------------
 */

Route::name('lost_items.')->middleware(['auth', 'verified'])->prefix('lost_items')->group(function () {
    Route::post('/store', 'LostAndFoundController@store')->name('store');
});

/**
 *-----------------------------
 * Posts and Feed Routes
 * ----------------------------
 */


Route::name('posts.')->middleware(['auth', 'verified'])->prefix('post')->group(function () {
    Route::post('remove', 'PostController@remove_post')->name('remove');
});

Route::middleware(['auth', 'verified'])->prefix('feed')->name('feed.')->group(function () {
    Route::post('/store', 'PostController@store')->name('store');
    Route::post('/like_dislike_post', 'PostController@like_dislike_post')->name('store');
    Route::get('/{type}', 'PostController@index');

    /**
     *-----------------------------
     * Post Comment and Found Routes
     * ----------------------------
     */

    Route::post('/post_comment', 'PostCommentController@store_comment')->name('store.comment');
    Route::post('/delete_comment', 'PostCommentController@delete_comment')->name('delete.comment');

});

/**
 *-----------------------------
 * Events Routes
 * ----------------------------
 */
Route::resource('event', 'EventController');
Route::get('myevents', 'EventController@my_events')->name('event.my_events');
Route::get('going_to_event/{event_id}/{type}', 'EventController@going_to_event')->middleware('auth');
Route::get('remove/{event_id}', 'EventController@remove')->name('event.remove')->middleware('auth');
Route::get('delete_event/{event_id}', 'EventController@remove')->name('event.delete')->middleware(['auth', 'verified']);
Route::post('message', 'EventController@message')->name('event.message')->middleware('auth');

/**
 * ---------------------
 * Real Estate Routes
 * ---------------------
 */

Route::middleware(['auth', 'verified'])->name('real_estate.')->prefix('real_estate')->group(function () {
    Route::get('listings', 'PropertiesController@index')->name('listings');
    Route::get('my_listings', 'PropertiesController@my_listings')->name('my_listings');
    Route::get('listing/create', 'PropertiesController@create')->name('create');
    Route::post('listing/store', 'PropertiesController@store')->name('store');
    Route::get('listing/delete/{id}', 'PropertiesController@delete')->name('delete');
    Route::get('listing/{id}/gallery', 'PropertiesController@gallery')->name('gallery');
    Route::post('listing/{id}/gallery/store', 'PropertiesController@store_property_image')->name('gallery.store');
    Route::get('listing/{property_id}/gallery/{id}/delete', 'PropertiesController@delete_gallery')->name('gallery.delete');
});
Route::get('real_estate/listing/show/{id}', 'PropertiesController@show')->name('real_estate.show');


/**
 * ---------------------
 * Public Agency Routes
 * ---------------------
 */
Route::name('agency.')->middleware(['auth', 'verified'])->prefix('agency')->group(function () {
    Route::get('list', 'PublicAgentController@agencies')->name('list');
    Route::get('feed', 'PublicAgentController@feed')->name('feed');
});


/**
 * --------------------
 * Report Item Routes
 * --------------------
 */
Route::name('report_item.')->middleware(['auth', 'verified'])->prefix('report_item')->group(function () {
    Route::post('report_item/store', 'ReportedPostController@store')->name('store');
});


Route::get('item/delete/{saleItem}', 'SaleItemController@delete')->name('delete_item');


/**
 * ---------------------------------
 * Login-Register Routes
 * ---------------------------------
 */

Route::get('/auth/register', 'RouteViewsController@signup')->name('signup2');
Route::get('/auth/register_continue', 'UserController@register_continue')->name('register_continue');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('/check_postal_code/{code}', 'HomeController@check_postal_code');


