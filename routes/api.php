<?php

use Illuminate\Http\Request;

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::get('/', 'HomeController@index');
Route::get('/shop', 'ShopController@index');
Route::get('/shop/search', 'ShopController@search');
Route::get('/category/{shop}', 'ShopController@category');
Route::get('/users','UserController@index');

Route::get('/product/review','ReviewController@index');
Route::get('/product/{product}', 'ProductController@show');
Route::get('/product/comment','CommentController@index');
Route::post('/product/review/add','ReviewController@store');
Route::post('/product/comment/add','CommentController@store');
Route::post('/product/review/add','ReviewController@store');

Route::get('cart','CartController@index');
Route::post('cart/add','CartController@store');
Route::delete('/cart/delete/{id}', 'CartController@delete');

Route::get('/wishlist','WishlistController@index');
Route::post('/wishlist/add','WishlistController@store');
Route::delete('/wishlist/delete/{id}', 'WishlistController@delete');

Route::get('/order','OrderController@index');
Route::post('/order/add','OrderController@store');

Route::get('/checkout','CheckoutController@index');
Route::post('/checkout/add','CheckoutController@store');
Route::post('/contact/add','ContactController@store');
