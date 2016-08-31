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

Route::get('/buyingrequest', 'BuyersController@create');
Route::post('/buyingrequest/store', ['as' => 'buyingrequest.store', 'uses' => 'BuyersController@store']);
Route::get('/buyingrequest/verifikasi/{encrypt}', 'BuyersController@verifikasi');

Route::group(['middleware' => 'web'], function () {
	Route::auth();
	Route::get('/home', 'HomeController@index');
	Route::get('/all-request', 'SellersController@allRequest');	
	Route::get('/all-report-request', 'SellersController@allReportRequest');		
	Route::get('/all-respond-request', 'SellersController@allRespondRequest');		
	Route::get('/all-request-approved', 'SellersController@allRequestApproved');		

	Route::get('/buyingrequest/{request_id}', 
		['as' => 'buyingrequest.show', 'uses' => 'SellersController@showRequest']
	);	

	Route::get('/respondrequest/report/{request_id}', 
		['as' => 'respondrequest.report', 'uses' => 'SellersController@reportRequest']
	);		

	Route::get('/respondrequest/nego/{request_id}', 
		['as' => 'respondrequest.nego', 'uses' => 'SellersController@negoRequest']
	);	

	Route::post('/negorequest/store', 
		['as' => 'negorequest.store', 'uses' => 'SellersController@negoRequestStore']
	);				

	Route::get('/respondrequest/{request_id}', 
		['as' => 'respondrequest.show', 'uses' => 'SellersController@showReSpondRequest']
	);		

	Route::get('/respondmessage/', 
		['as' => 'respond.message', 'uses' => 'SellersController@message']
	);		

	Route::get('/respondapproved/{id}', 
		['as' => 'respondrequest.approved', 'uses' => 'SellersController@approvedReSpondRequest']
	);			
});