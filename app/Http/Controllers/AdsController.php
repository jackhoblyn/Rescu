<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{
    public function index()

    {
    	// $ads = Ad::all(); //Showall projects
        $ads = auth()->user()->ads()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
    	return view('ads.index', compact('ads'));
    }

        public function all()

    {
        $ads = Ad::orderBy('updated_at','desc')->get(); //Showall projects
        return view('ads.showall', compact('ads'));
    }

     public function show(Ad $ad)

    {
       
        if(auth()->user()->isNot($ad->user)) {
            abort(403);
        }

         return view('ads.show', compact('ad'));
    }

    public function list(Ad $ad)

    {
         return view('ads.list', compact('ad'));

    }

    

    public function store()

    {
    	$attributes = request()->validate([
            'title' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $ad = auth()->user()->ads()->create($attributes);

    	return redirect($ad->path());
    }


    public function create() 
    {
        return view('ads.create');
    }

    public function respond(Ad $ad)

    {
         return view('ads.respond');

    }

     public function response(Ad $ad)

    {
        $attributes = request()->validate([
            'description' => 'required',
            'offer' => 'required'
        ]);

        auth('vendor')->user()->ads()->create($attributes);
       return redirect('/vendor/ads');
    }

}
