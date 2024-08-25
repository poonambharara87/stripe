<?php

namespace App\Http\Controllers;
use App\Models\Currency;
use App\Models\PaymentPlatform;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PaymentController extends Controller
{
//    public function __construct()
//    {
//         $this->middleware('auth');
//    } 


//    public function index()
//    {

//         $currencies = Currency::all();
//         $payment_platforms = PaymentPlatform::all();

//         return view('home')->with([
//             'currencies' => $currencies,
//             'payment_platforms' => $payment_platforms
//         ]);
//    }


    public function pay(Request $request)
    {
       
       $rules = [
        'value' => ['required', 'numeric', 'min:5'],
        'currency' => ['required'],
        'payment_platform' => [ 'required', 'exists:payment_platforms,id']
       ];
   
       $request->validate($rules);
       return $request->all();
    //    return $request->all();
    }

    public function approval()
    {
      
    }

    public function cancelled()
    {
      
    }


    }
