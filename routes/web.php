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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');
Route::get('/orders', 'UserController@index')->name('orders');
Route::get('/product/{product}', 'ProductController@show')->name('product.show');


Route::get('/product', 'ProductController@create')->name('product.create');
Route::post('/product', 'ProductController@store')->name('product.store');

Route::post('/add/{product}', 'ProductController@addToCart')->name('product.addToCart');
Route::get('/product/edit/{product}','ProductController@edit')->name('product.edit');
Route::patch('/product/edit/{product}','ProductController@update')->name('product.update');
Route::patch('/product/{product}/image', 'ProductController@updateImage')->name('product.updateImage');
Route::delete('/product/{product}/delete', 'ProductController@destroy')->name('product.delete');
Route::get('/reduce/{product}', 'ProductController@reduceByOne')->name('reduceByOne');
Route::get('/remove/{product}', 'ProductController@removeItem')->name('removeItem');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/checkout', 'ProductController@checkout')->name('checkout');
Route::post('/checkout', 'ProductController@buyNow')->name('buyNow');


