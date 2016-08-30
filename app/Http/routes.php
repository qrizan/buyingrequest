<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/buyingrequest', 'BuyersController@index');
Route::post('/buyingrequest/store', ['as' => 'buyingrequest.store', 'uses' => 'BuyersController@store']);
Route::get('/buyingrequest/verifikasi/{encrypt}', 'BuyersController@verifikasi');

Route::group(['middleware' => 'web'], function () {
	Route::auth();
	Route::get('/home', 'HomeController@index');
});
