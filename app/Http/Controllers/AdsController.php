<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ad;
use App\User;
use App\Vendor;
use App\Response;
use App\Repair;
use Image;
use Auth;
use App\Notifications\ResponseChosen;

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
        $search = $ad->brand;
        $city = $ad->user->city;

        //Find the best three fixers in your area who specialize in your device
        $vendors = Vendor::where('city', 'LIKE', "%$city%")
                    ->where('skill', 'LIKE', "%$search%")
                    ->orderBy('rating', 'desc')
                    ->paginate(3);
        
        return view('ads.show', compact('ad', 'vendors'));
    }

    public function list(Ad $ad)
    {
         return view('ads.list', compact('ad'));

    }

    public function full(Ad $ad)
    {
         return view('ads.full', compact('ad'));

    }

    public function updatephoto(Ad $ad, Request $request)

    {
        if($request->hasFile('photo'))
       {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save( public_path('/uploads/photos/' . $filename));

            $ad->photo = $filename;
            $ad->save();
       }
         return view('ads.full', compact('ad'));

    }

     public function edit(Ad $ad)

    {
         return view('ads.edit', compact('ad'));

    }

    public function store()

    {
    	$attributes = request()->validate([
            'title' => 'required',
            'phone' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $ad = auth()->user()->ads()->create($attributes);

        return redirect($ad->path())->with('flash', 'Your ad has been created');
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

    public function create() 
    {
        return view('ads.create');
    }

    public function respond(Ad $ad)

    {
        return view('ads.respond');

    }

    public function reopen(Ad $ad)
    {

        $ad->open();
        return redirect($ad->path());
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

    public function choose(Ad $ad, Response $response)
    {
        $ad->chosen();
        $ad->save();

        $repair = Repair::create([
            'user_id' => $ad->user->id,
            'vendor_id' => $response->vendor_id,
            'ad_id' => $ad->id,
            'response_id' => $response->id,
            'title' => $ad->title,
            'description' => $ad->description,
            'price' => $response->offer,
            'phone' => $ad->phone,
            'pic' => $ad->photo
        ]);

        $ad = Ad::find($ad->id);
        $user = User::find($ad->user_id);

        $response->vendor->notify(new ResponseChosen($repair, $ad, $user));

        return redirect($repair->path())->with('flash', 'Offer chosen, here is your repair homescreen');

    }

    // public function show(Ad $ad)

    // {
       
    //     if(auth()->user()->isNot($ad->user)) {
    //         abort(403);
    //     }

    //      return view('ads.show', compact('ad'));
    // }

}
