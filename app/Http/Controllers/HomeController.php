<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    // without login
    public function index(){
        $products = Product::paginate(9);
        return view('frontend.homepage', compact('products'));
    }
    // with login
    public function redirect(){
        if(auth()->user()->usertype == 1){
            return view('admin.dashboard');
        }else{
            $products = Product::paginate(9);
            return view('frontend.homepage', compact('products'));
        }
    }

    // show product details
    public function product_details($id){
        $product = Product::find($id);
        return view('frontend.product_details', compact('product'));
    }
}
