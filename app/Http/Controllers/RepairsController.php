<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;
use Session;
use Stripe\Stripe;
use Stripe\Charge;

class RepairsController extends Controller
{
    public function show(Repair $repair)
    {

         return view('repairs.show', compact('repair'));
    }

    public function list(Repair $repair)
    {

         return view('repairs.list', compact('repair'));
    }

    public function full(Repair $repair)
    {

         return view('repairs.full', compact('repair'));
    }

    public function fullAd(Repair $repair)
    {

         return view('repairs.fullAd', compact('repair'));
    }

    public function index()
    {
    	// $ads = Ad::all(); //Showall projects
        $repairs = auth()->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
    	return view('repairs.index', compact('repairs'));
    }

    public function finished()
    {
        $repairs = auth()->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
        return view('repairs.finished', compact('repairs'));
    }

    public function all()

    {
        // $ads = Ad::all(); //Showall projects
        $repairs = auth('vendor')->user()->repairs()->orderBy('updated_at', 'desc')->get(); //show ads by a certain user,
        return view('repairs.all', compact('repairs'));
    }


    public function destroy(Repair $repair)

    {
         $repair->ad->open();
         $repair->response->delete();

         $repair->delete();

         return redirect('/vendor/home');
    }

    public function finish(Repair $repair)
    {
        $repair->finish();

        return redirect('/vendor/home');
    }

    public function review(Repair $repair)
    {
        $userId = auth()->user()->id; 
        $rating = request('rating');

        Review::create([
            'user_id' => $userId,
            'repair_id' => $repair->id,
            'vendor_id' => $repair->vendor_id,
            'description' => request('description'),
            'rating' => $rating
        ]);

        $avgStar = \DB::table('reviews')
         ->where('vendor_id', $repair->vendor_id)
         ->avg('rating');

         $vendor->rating = $avgStar;
         $vendor->save();

        return redirect('/home');
    }

    public function pay(Repair $repair)
    {
       return view('stripe');
    }


    public function stripe(Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
     
    $stripe = Stripe::make('sk_test_K0ThsZWtj2g1AorbBQDcV2h5');
    try {
        $token = $stripe->tokens()->create([
            'card' => [
                'number'    => $request->get('card_no'),
                'exp_month' => $request->get('expiry_month'),
                'exp_year'  => $request->get('expiry_year'),
                'cvc'       => $request->get('cvv'),
            ],
        ]);
        if (!isset($token['id'])) {
            return Redirect::to('strips')->with('Token is not generate correct');
        }
        $charge = $stripe->charges()->create([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount'   => 20,
            'description' => 'Register Event',
        ]);
        $charge = Charge::create(array(
            'amount' => 20,
            "source" => $token,
            'currency' => 'usd'
        ));
     
         return 'Payment Success';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
            
      }  

    
}
