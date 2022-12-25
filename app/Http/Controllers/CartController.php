<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    //add cart data to table
    public function add_cart(Request $request, $id){
        $user = auth()->user();

        $product = Product::find($id);

        $cart = new Cart;

        // if cart available for current user
        $current_cart = $cart->where('user_id', $user->id)->where('product_id', $product->id)->first();

        if($current_cart==null){
            $cart->username = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            if($product->dis_price != null){
                $cart->price = $product->dis_price;
            }else{
                $cart->price = $product->price;
            }
            if($request->quantity != null){
                $cart->quantity = $request->quantity;
            }else{
                $cart->quantity = 1;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;

            $cart->save();
        }else{
            if($request->quantity != null){
                $current_cart->quantity = $current_cart->quantity + $request->quantity;
            }else{
                $current_cart->quantity++;
            }
            

            if($product->dis_price != null){
                $current_cart->price = $product->dis_price * $current_cart->quantity;
            }else{
                $current_cart->price = $product->price * $current_cart->quantity;
            }

            $current_cart->update();
            
            
        }

        return back();
    }

    // show cart
    public function show_cart(){
        $user_id = auth()->user()->id;

        $cart = Cart::where('user_id', $user_id)->get();

        return view('frontend.show_cart', compact('cart'));
    }

    // delete cart
    public function delete_cart($id){
        $cart = Cart::find($id);
        $cart->delete();

        return back();
    }
}
