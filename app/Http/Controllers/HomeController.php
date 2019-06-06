<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\gmaps_geocache;
use Auth;
use App\Vendor;
use App\User;
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

    public function clearNotifications(User $user)
    { 
        $user = Auth::user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect('/home');
    }

    public function clearMessages(User $user)
    { 
        $user = Auth::user();


        foreach ($user->messages as $message) {
            $message->read = 'yes';
            $message->save();
        }

        return redirect('/home');
    }

    public function msgsCount(User $user)
    { 
        $user = Auth::user();

        $messages = $user->messages();

        dd($messages);
    }

    public function profile()
    {
        return view('profiles.profile');
    }

    public function showVendor(Vendor $vendor)
    {

        return view('profiles.viewFixer', compact('vendor'));
    }

    public function editProfile()
    {
        return view('profiles.edit');
    }

     public function editPhoto(Request $request)
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

       return redirect('/profile');
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

    public function updateProfile()
    {
       $attributes = request()->validate([
            'name' => 'required',
            'city' => 'required',
            'bio' => 'required'
        ]);

        $user = Auth::user();
        $user->update($attributes);
       
        return redirect('/profile');
    }

    public function update(Ad $ad)
    {
       $attributes = request()->validate([
            'title' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $ad->update($attributes);

        if ($ad->chosen == 'yes')
        {
            $ad->chosen();
        } else {
            $ad->open();
        }
       
        return redirect($ad->path());
    }

}
