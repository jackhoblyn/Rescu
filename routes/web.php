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

Route::get('/map', function () {
    return view('map');
});

Route::get('/map2', function () {
	$config['center'] = 'Dublin City, Ireland';
	$config['zoom'] = '12';
	$config['map-height'] = '700px';
	$config['map-width'] = '100%';
	$config['geocodeCaching'] = true;

	GMaps::initialize($config);

	//Marker
	$marker['position'] = 'Dublin City, Ireland';


	GMaps::add_marker($marker);

	$map = GMaps::create_map();

    return view('map2')->with('map', $map);
});

Route::group(['middleware' => 'auth'], function () {


	Route::get('/ads', 'AdsController@index');//means you have to be signed in

	Route::get('/ads/create', 'AdsController@create');
	
	Route::get('/ads/{ad}', 'AdsController@show');

	Route::get('/ads/full/{ad}', 'AdsController@full');

	Route::post('/ads/full/{ad}', 'AdsController@updatephoto');

	Route::get('/ads/edit/{ad}', 'AdsController@edit');

	Route::patch('/ads/edit/{ad}', 'AdsController@update');

	Route::post('/ads', 'AdsController@store');

	Route::post('/ads/{ad}/choose/{response}', 'AdsController@choose');
	
	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/home', 'HomeController@update_avatar');

	Route::get('/profile', 'HomeController@profile')->name('profile');

	Route::get('/repairs', 'RepairsController@index');

	Route::get('/repairs/{repair}', 'RepairsController@show');

});


Auth::routes();




//vendor routes
Route::get('/register/vendor', 'VendorController@create');

Route::get('/login/vendor', 'VendorController@loginVendor');

Route::post('/register/vendor', 'VendorController@registerVendor')->name('register.vendor');

Route::post('/login/vendor', 'VendorController@vendorAuth')->name('login.vendor');

Route::get('/vendor/home', 'VendorController@home');





//vendor routes we want protected 
Route::group(['middleware'=>'vendor'], function() {

	Route::get('/home/vendor', 'VendorController@home')->name('home.vendor');

	Route::post('/logout/vendor', 'VendorController@logout')->name('logout.vendor');

	Route::get('/vendor/ads', 'AdsController@all');

	Route::get('/vendor/ads/{ad}', 'AdsController@list');

	// Route::get('/vendor/ads/{ad}/responses', 'AdsController@respond');

	Route::post('/vendor/ads/{ad}/responses/', 'ResponseController@store');

	Route::patch('/vendor/ads/{ad}/responses/{response}', 'ResponseController@update');

	});


//ad routes


