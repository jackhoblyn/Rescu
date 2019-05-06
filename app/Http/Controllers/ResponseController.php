<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Response;
use App\Vendor;
use App\User;
use App\Notifications\ResponsePosted;

class ResponseController extends Controller
{
    
    public function store(Ad $ad, Vendor $vendor)
    {
        Response::create([
            'description' => request('description'),
            'offer' => request('offer'),
            'chosen' => false,
            'ad_id' => $ad->id,
            'vendor_id' => Auth('vendor')->user()->id
        ]);

         $ad = Ad::find($ad->id);
         $vendor = Vendor::find(Auth('vendor')->user()->id);


        $ad->user->notify(new ResponsePosted($ad, $vendor));

        return back();
    }


    public function update(Ad $ad, Response $response)
    {
    	$response->update([
			'description' => $response->description,
			'chosen' => request()->has('chosen') 
    		]);

    	return redirect($ad->path());

    }
}
