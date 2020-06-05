<?php

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


// ======================== FrontEnd Routes Start ================================

Route::group(['namespace' => 'Site', 'as' => 'site.'], function() {
    Route::get('/', 'FrontendController@home')->name('home');
    Route::get('/category', 'FrontendController@category')->name('category');
    Route::get('/product', 'FrontendController@singleProduct')->name('product');
    Route::get('/contact', 'FrontendController@contact')->name('contact');

    Route::get('/cart', 'FrontendController@showCart')->name('cart');
    Route::get('/checkout', 'FrontendController@checkout')->name('checkout');



});


// ======================== FrontEnd Routes End ==================================


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// ======================== Backend Routes Start ================================

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function() {
    Route::get('/', 'AdminPanelController@home')->name('home');
    
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');


});


// ======================== Backend Routes End ==================================
