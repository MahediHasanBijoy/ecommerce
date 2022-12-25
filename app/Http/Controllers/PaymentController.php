<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;
use App\Models\Cart;
use App\Models\Order;

class PaymentController extends Controller
{
    //show payment page
    public function index($totalprice){
        return view('frontend.payment', compact('totalprice'));
    }


    // test card number: 4242424242424242
    // payment processing method
    public function payment(Request $request, $totalprice)
    {
        
        // stripe payment creadentials
        Stripe\Stripe::setApiKey(config('app.stripe_secret'));
        Stripe\Charge::create ([
                "amount" => $totalprice * 150,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);

        /*
            move products from cart table to order table
        */

        // current authenticated user id
        $user_id = auth()->user()->id;

        // cart data for this user id
        $carts = Cart::where('user_id', $user_id)->get();

        // store cart data to order table
        foreach($carts as $cart){
            $order = new Order;
            $order->name = $cart->username;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $user_id;

            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'paid';
            $order->delivery_status = 'processing';

            $order->save();

            // delete data from cart
            $cart->delete();
  
        }
  
        Session::flash('success', 'Payment has been successfully processed.');
          
        return back();
    }
}
