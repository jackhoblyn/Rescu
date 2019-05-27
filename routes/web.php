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
	$config['center'] = 'Lidl Repairs';
	$config['zoom'] = '12';
	$config['map-height'] = '800px';
	$config['map-width'] = '100%';
	$config['geocodeCaching'] = true;

	GMaps::initialize($config);

	$gmaps_geocaches = gmaps_geocache::orderBy('updated_at','desc')->get();

	foreach($gmaps_geocaches as $gmaps_geocache)
	{
		$marker['position'] = $gmaps_geocache->address;
		$link = $gmaps_geocache->vendor_id;
		$name = $gmaps_geocache->address;
		$image = $gmaps_geocache->vendor->avatar;
		$rating = $gmaps_geocache->vendor->rating;
		$phone = $gmaps_geocache->vendor->phone;
		$email = $gmaps_geocache->vendor->email;

		$marker['infowindow_content'] = '<div id="content" style="width:280px; height: 185px; border-style: solid; border-color: green; text-align: center"> <a href="/view/' . $link . '" style="text-decoration: none"><h1 style="font-family: calibri; ">' . $name . '</h1> <div style="text-align: center;"> <div style="display: inline-block;"> <img src="/uploads/avatars/' . $image . '" style=" border-radius:50%; max-height: 100px; max-width: 100px;"> </div><div><h2>' . $email . ' </h2 style="margin-top=3px"></div> <div><h2 style="margin-top: 8px;">' . $phone . '</h2></div> </div></a></div>';



		if($gmaps_geocache->vendor->type == 'shop')
		{
			$marker['icon'] = "/img/repair.png";
		}
		else
		{
			$marker['icon'] = "/img/man.png";
		}

		
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

	Route::get('/profile/{user}/edit', 'HomeController@editProfile');

	Route::post('/profile/{user}/editPhoto', 'HomeController@editPhoto');

	Route::patch('/profile/{user}/update', 'HomeController@updateProfile');

	Route::get('/view/{vendor}', 'HomeController@showVendor');

	Route::get('/repairs', 'RepairsController@index');

	Route::get('/finished', 'RepairsController@finished');

	Route::get('/repairs/{repair}', 'RepairsController@show');

	Route::get('/repairs/{repair}/full', 'RepairsController@full');

	Route::get('/repairs/{repair}/review', 'ReviewsController@create');

	Route::post('/repairs/{repair}/review', 'ReviewsController@store');

	

});


Auth::routes();




//vendor routes
Route::get('/register/vendor', 'VendorController@create');

Route::get('/login/vendor', 'VendorController@loginVendor');

Route::post('/register/vendor', 'VendorController@registerVendor')->name('register.vendor');

Route::post('/login/vendor', 'VendorController@vendorAuth')->name('login.vendor');

Route::get('/x', function () {
    return view('test');
});


//vendor routes we want protected 
Route::group(['middleware'=>'vendor'], function() {

	Route::get('/vendor/home', 'VendorController@home');

	Route::get('/vendor/profile', 'VendorController@profile');

	Route::get('/vendor/profile/{vendor}/edit', 'VendorController@editProfile');

	Route::post('/vendor/profile/{vendor}/editPhoto', 'VendorController@editPhoto');

	Route::patch('/vendor/profile/{vendor}/update', 'VendorController@updateProfile');

	Route::get('/vendor/map', 'VendorController@map');

	Route::post('/vendor/map', 'VendorController@locationMake');
    
	Route::post('/logout/vendor', 'VendorController@logout')->name('logout.vendor');

	Route::get('/vendor/ads', 'AdsController@all');

	Route::get('/vendor/ads/{ad}', 'AdsController@list');

	Route::post('/vendor/ads/{ad}/responses/', 'ResponseController@store');

	Route::patch('/vendor/ads/{ad}/responses/{response}', 'ResponseController@update');

	Route::get('/vendor/repairs', 'RepairsController@all');

	Route::get('/vendor/repairs/{repair}', 'RepairsController@list');

	Route::post('/vendor/repairs/{repair}/finish', 'RepairsController@finish');

	Route::post('/vendor/repairs/{repair}', 'RepairsController@destroy');

	Route::get('/vendor/repairs/{repair}/fullAd', 'RepairsController@fullAd');

	Route::post('/vendor/repairs/{repair}/updates', 'UpdatesController@store');



	});


//ad routes


