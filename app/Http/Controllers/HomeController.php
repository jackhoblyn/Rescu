<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\gmaps_geocache;
use Auth;
use Image;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }

     public function update_avatar(Request $request)
    {
       if($request->hasFile('avatar'))
       {
       		$avatar = $request->file('avatar');
       		$filename = time() . '.' . $avatar->getClientOriginalExtension();
       		Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename));

       		$user = Auth::user();
       		$user->avatar = $filename;
       		$user->save();
       }

       return view('home');
    }

    public function map(gmaps_geocache $gmaps_geocache)
    {
        $config['center'] = 'Dublin City, Ireland';
        $config['zoom'] = '12';
        $config['map-height'] = '700px';
        $config['map-width'] = '100%';
        $config['geocodeCaching'] = true;

        GMaps::initialize($config);

        //Marker
        $marker['position'] = 'Dublin City, Ireland';
        $marker['infowindow_content'] = 'Dublin City, Ireland';

        GMaps::add_marker($marker);

        $marker['position'] = 'Carphone Warehouse';
        $marker['infowindow_content'] = 'Carphone Warehouse';

        GMaps::add_marker($marker);

        $map = GMaps::create_map();

          return view('map2')->with('map', $map);
    }

}
