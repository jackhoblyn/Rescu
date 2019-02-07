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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {


	Route::get('/ads', 'AdsController@index');//means you have to be signed in

	Route::get('/ads/create', 'AdsController@create');
	
	Route::get('/ads/{ad}', 'AdsController@show');

	Route::post('/ads', 'AdsController@store');

	



	Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();





//vendor routes
Route::get('/register/vendor', 'VendorController@create');
Route::get('/login/vendor', 'VendorController@loginVendor');
Route::post('/register/vendor', 'VendorController@registerVendor')->name('register.vendor');
Route::post('/login/vendor', 'VendorController@vendorAuth')->name('login.vendor');

//vendor routes we want protected 
Route::group(['middleware'=>'auth:vendor'], function(){
Route::get('/home/vendor', 'VendorController@home');
Route::post('/logout/vendor', 'VendorController@logout')->name('logout.vendor');
});


//ad routes


