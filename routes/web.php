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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index')->name('Cart');
Route::get('/orders', 'OrderController@index')->name('Orders');
Route::get('/checkout', 'CartController@checkout');

Route::get('/addToCart/{category}/{article}/{articleId}', 'CartController@addToCart');
Route::get('/addAmount/{articleId}', 'CartController@addAmount');
Route::get('/removeAmount/{articleId}', 'CartController@removeAmount');
Route::get('/deleteFromCart/{articleId}', 'CartController@deleteFromCart');

Route::get('/{category}', 'CategoryController@index')->name('Category');
Route::get('/{category}/{article}', 'ItemController@index')->name('Item');
