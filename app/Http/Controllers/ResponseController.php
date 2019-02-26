<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Response;

class ResponseController extends Controller
{
    // public function store(Ad $ad)
    // {
    // 	$attributes = request()->validate([
    //     'description' => 'required',
    //      'offer' => 'required'
    //     ]);

    // 	$ad->addResponse(request($attributes));

    // 	return redirect($ad->list());
    // }

    public function store(Ad $ad)
    {
        Response::create([
            'description' => request('description'),
            'offer' => request('offer'),
            'chosen' => false,
            'ad_id' => $ad->id

        ]);

        return back();
    }


    // public function store(Ad $ad)

    // {
    //     $attributes = request()->validate([
    //         'title' => 'required',
    //         'phone' => 'required',
    //         'description' => 'required',
    //         'price' => 'required'
    //     ]);

    //     $ad = auth()->user()->ads()->create($attributes);

    //     return redirect($ad->path());
    // }




    public function update(Ad $ad, Response $response)
    {
    	$response->update([
			'description' => $response->description,
			'chosen' => request()->has('chosen') 
    		]);

    	return redirect($ad->path());

    }
}
