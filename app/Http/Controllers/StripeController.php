<?php
 
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
 
class StripeController extends Controller
{
 
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function stripe()
    {
        return view('checkout');
    }
 
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            $charge = Stripe::charges()->create([
                'amount' => $request->amount,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' =>[],
            ]);

            return back()->with('success_message', 'Thank You');
        } catch (Exception $e) {

        }






            
    }
    
}