<?php

use App\gmaps_geocache;
use App\User;
use App\Notifications\ResponsePosted;
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


Route::get('/map', function (gmaps_geocache $gmaps_geocache) {
	$config['center'] = 'Carphone Warehouse';
	$config['zoom'] = '12';
	$config['map-height'] = '800px';
	$config['map-width'] = '100%';
	$config['geocodeCaching'] = true;

	GMaps::initialize($config);

	$gmaps_geocaches = gmaps_geocache::orderBy('updated_at','desc')->get();

	foreach($gmaps_geocaches as $gmaps_geocache)
	{
		$marker['position'] = $gmaps_geocache->address;
		$marker['infowindow_content'] = $gmaps_geocache->address;
		GMaps::add_marker($marker);
	}

	$map = GMaps::create_map();

    return view('map2')->with('map', $map);
});

Route::get('/vendor/map2', function (gmaps_geocache $gmaps_geocache) {
	$config['center'] = 'Carphone Warehouse';
	$config['zoom'] = '12';
	$config['map-height'] = '800px';
	$config['map-width'] = '100%';
	$config['geocodeCaching'] = true;

	GMaps::initialize($config);

	$gmaps_geocaches = gmaps_geocache::orderBy('updated_at','desc')->get();

	foreach($gmaps_geocaches as $gmaps_geocache)
	{
		$marker['position'] = $gmaps_geocache->address;
		$marker['infowindow_content'] = $gmaps_geocache->address;
		GMaps::add_marker($marker);
	}

	$map = GMaps::create_map();

    return view('map3')->with('map', $map);
});


//USER ROUTES
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

	Route::get('/repairs/{repair}/full', 'RepairsController@full');

});


Auth::routes();




//vendor routes
Route::get('/register/vendor', 'VendorController@create');

Route::get('/login/vendor', 'VendorController@loginVendor');

Route::post('/register/vendor', 'VendorController@registerVendor')->name('register.vendor');

Route::post('/login/vendor', 'VendorController@vendorAuth')->name('login.vendor');


//vendor routes we want protected 
Route::group(['middleware'=>'vendor'], function() {

	Route::get('/vendor/home', 'VendorController@home');

	Route::get('/vendor/map', 'VendorController@map');

	Route::post('/vendor/map', 'VendorController@locationMake');
    
	Route::post('/logout/vendor', 'VendorController@logout')->name('logout.vendor');

	Route::get('/vendor/ads', 'AdsController@all');

	Route::get('/vendor/ads/{ad}', 'AdsController@list');

	Route::post('/vendor/ads/{ad}/responses/', 'ResponseController@store');

	Route::patch('/vendor/ads/{ad}/responses/{response}', 'ResponseController@update');

	Route::get('/vendor/repairs', 'RepairsController@all');

	Route::get('/vendor/repairs/{repair}', 'RepairsController@list');

	Route::Delete('/vendor/repairs/{repair}', 'RepairsController@destroy');

	Route::get('/vendor/repairs/{repair}/fullAd', 'RepairsController@fullAd');

	Route::post('/vendor/repairs/{repair}/updates', 'UpdatesController@store');



	});


//ad routes


