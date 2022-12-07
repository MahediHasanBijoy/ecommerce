<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // Show category
    public function showcategory(){
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    // Add category
    public function add_category(Request $request){
        $category = new Category;

        $category->create($request->all());

        $message = $request->category_name.' added successfully';

        return back()->with('message', $message);
    }

    // Delete category
    public function delete($id){
        // find category
        $category = Category::find($id);
        // session message
        $message = $category->category_name.' deleted successfully';

        $category->delete();
        //redirect back with session message
        return back()->with('message', $message);
    }
}
