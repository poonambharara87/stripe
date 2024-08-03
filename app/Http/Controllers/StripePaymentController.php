<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe;
class StripePaymentController extends Controller
{
    public function index()
    {
        return view('stripe');
    }
      
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripe(Request $request)
    // {
    //     // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
    //     $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

    //     $paymentMethod = $stripe->paymentMethods->create([
    //         'type' => 'card',
    //         'card' => [
    //             'token' => $request->input('stripeToken'),
    //         ],
    //     ]);

    //     $stripe->paymentIntents->create([
    //         'amount' => 2000,
    //         'currency' => 'inr',
    //         'payment_method' => $paymentMethod->id,
    //     ]);
                
    //     return back()->with('success', 'Payment has been successful');
    // }

    public function stripePost(Request $request)
    {
        try{

            $stripe = new \Stripe\StripeClient(
               env('STRIPE_SECRET')
            );
            
            $stripe->tokens->create([
                'card' => [
                'number' => $request->number,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvc' => $request->cvc,
                ],
            ]);

            Stripe\Stripe::SetApiKey(config('services.stripe.secret')); 
            $response = $stripe->charges->create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $response->id,
              ]);

              return response()->json([$response->status], 201);

        }catch(Exception $e)
        {
            return response()->json(['response' => 'Error'], 500);
        }
    }

}
