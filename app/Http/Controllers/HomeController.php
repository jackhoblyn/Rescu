<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
}
