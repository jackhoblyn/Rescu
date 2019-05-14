<?php

namespace App\Http\Controllers;
use App\Repair;
use App\Review;
use App\Vendor;


use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function create(Repair $repair) 
    {
        return view('reviews.create', compact('repair'));
    }

    public function store(Repair $repair)
    {
    	$userId = auth()->user()->id; 
    	$rating = request('rating');

        Review::create([
        	'user_id' => $repair->user_id,
        	'repair_id' => $repair->id,
        	'vendor_id' => $repair->vendor_id,
          	'description' => request('description'),
          	'rating' => $rating
        ]);

        $avgStar = \DB::table('reviews')
         ->where('vendor_id', $repair->vendor_id)
         ->avg('rating');

         $vendor = Vendor::find($repair->vendor_id);
         $vendor->rating = $avgStar;
         $vendor->save();

        return redirect('/home')->with('flash', 'Your review was posted');
    }
}
