<?php
 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Repair;
 
class StripeController extends Controller
{
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function stripe(Repair $repair)
    {
        return view('checkout', compact('repair'));
    }
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function store(Request $request, Repair $repair)
    {

        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_oQYxD2s7yDQAq4MupfPbY42e00aqRUHJrA');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $repair->price*100,
            'currency' => 'eur',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        $repair->payment = 'yes';
        $repair->save();

        return redirect()->route('repair.show', ['repair' => $repair->id]);
            
    }
    
}