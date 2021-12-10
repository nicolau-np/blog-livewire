<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => "pessoas"], function () {
    Route::get('/', "HomeController@index");
    Route::post('/store', "HomeController@store");
    Route::get('/show/{id}', "HomeController@show");
    Route::put('/update/{id}', "HomeController@update");
    Route::delete('/destroy/{id}', "HomeController@destroy");
});