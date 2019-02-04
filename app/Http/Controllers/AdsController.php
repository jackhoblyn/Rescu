<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{
    public function index()

    {

    	$ads = Ad::all();

    	return view('ads.index', compact('ads'));
    }

     public function show(Ad $ad)

    {


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

    	Ad::create($attributes);

    	return redirect('/ads');

    }
}
