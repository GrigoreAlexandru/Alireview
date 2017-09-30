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
Route::post('/items/{id}/like', 'ItemController@like');
Route::post('/items/{id}/dislike', 'ItemController@dislike');
Route::get('/search', 'ItemController@search');


Route::get('/', 'PagesController@index');
Route::resource('items', 'ItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
