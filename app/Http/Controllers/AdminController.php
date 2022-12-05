<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    //
    public function showcategory(){
        return view('admin.category');
    }

    // Add category
    public function add_category(Request $request){
        $category = new Category;

        $category->create($request->all());

        $message = $request->category_name.' added successfully';

        return back()->with('message', $message);
    }
}
