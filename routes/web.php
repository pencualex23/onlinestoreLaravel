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

Route::get('/', function(){
    return view('/men');
});
Route::get('/men', 'MenController@index');
Route::get('/women', 'WomenController@index');
Route::get('/kids', 'KidsController@index');
Route::get('/men/tshirts' , 'MenController@tshirts');
Route::get('/men/tshirts/{id}' , 'MenController@model');
Route::post('/men/tshirts/{id}' , 'MenController@buy');
