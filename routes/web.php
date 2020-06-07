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
    Route::get('/category/{id}', 'FrontendController@category')->name('category');
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

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('/', 'AdminPanelController@home')->name('home');
    // Admin Dashboard Route
    // apply middleware for unauthorized users 
    // without Admin
    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/', function() {
            return view('backend.dashboard.dashboard');
        })->name('home');

    });

    // Password Change Routes


});



Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.', 'middleware' => ['auth:admin']], function() {
    
    
    // Category Routes
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories', 'CategoryController@store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('/categories/{id}', 'CategoryController@update')->name('categories.update');
    Route::get('/categories/{id}/delete', 'CategoryController@destroy')->name('categories.destroy');

    // Brand Routes
    Route::get('/brands', 'BrandController@index');
    Route::get('/brands/create', 'BrandController@create');
    Route::post('/brands', 'BrandController@store');
    Route::get('/brands/{id}/edit', 'BrandController@edit')->name('brands.edit');
    Route::post('/brands/{id}', 'BrandController@update')->name('brands.update');
    Route::get('/brands/{id}/delete', 'BrandController@destroy')->name('brands.destroy');

    // Product Routes
    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products', 'ProductController@store');
    Route::get('/products/{id}', 'ProductController@show')->name('products.show');
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
    Route::post('/products/{id}', 'ProductController@update')->name('products.update');
    Route::get('/products/{id}/delete', 'ProductController@destroy')->name('products.destroy');


});


// ======================== Backend Routes End ==================================
