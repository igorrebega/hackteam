<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'ProductController@index')->name('website.products');
Route::post('/product/vote/{id}', 'ProductController@vote')->name('website.products.vote');
Route::get('/product/{id}', 'ProductController@view')->name('website.products.view');

Route::get('/media/{relativePath}', 'MediaController@getMedia')->where('relativePath', '(.*)');