<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(auth()->user()->usertype == 1){
            return view('admin.dashboard');
        }else{
            return view('frontend.homepage');
        }
    }
}
