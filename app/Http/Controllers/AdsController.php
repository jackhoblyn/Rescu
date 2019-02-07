<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{
    public function index()

    {

    	$ads = Ad::all(); //Showall projects

        //$ads = auth()->user()->ads; //show ads by a certain user,

    	return view('ads.index', compact('ads'));
    }

     public function show(Ad $ad)

    {
       
        if(auth()->user()->isNot($ad->user)) {
            abort(403);
        }

         return view('ads.show', compact('ad'));
    }



    public function store()

    {


    	$attributes = request()->validate([
            'title' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        auth()->user()->ads()->create($attributes);

    	return redirect('/ads');

    }


    public function create() 
    {
        return view('ads.create');
    }
}
