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

Route::get('/', 'MyController@homePage');
Route::get('/men', 'MyController@index');
Route::get('/men/tshirts' , 'MyController@tshirtsForMan');
Route::get('/men/tshirts/{id}' , 'MyController@model');
Route::post('/men/tshirts/{id}' , 'MyController@buy');
Route::post('/login' , 'MyController@login');
Route::get('/logout' , 'MyController@logout');
Route::post('/register' , 'MyController@register');
Route::get('/deleteOrder/{id}' , 'MyController@deleteOrder');
