<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ad;
use App\Response;
use App\Repair;
use Image;
use Auth;

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
            'description' => 'required',
            'price' => 'required'
        ]);


        $ad = auth()->user()->ads()->create($attributes);
       return redirect($ad->path());
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

    public function choose(Ad $ad, Response $response)
    {
        $repair = Repair::create([
            'user_id' => $ad->user->id,
            'vendor_id' => $response->vendor_id,
            'title' => $ad->title,
            'description' => $ad->description,
            'price' => $response->offer,
            'phone' => $ad->phone,
            'pic' => $ad->photo
        ]);

        $ad->chosen = 'yes';
        $ad->save();

        return redirect($repair->path());

    }

    // public function show(Ad $ad)

    // {
       
    //     if(auth()->user()->isNot($ad->user)) {
    //         abort(403);
    //     }

    //      return view('ads.show', compact('ad'));
    // }

}
