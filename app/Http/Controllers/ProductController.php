<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // view addproduct page
    public function addproduct(){

        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    // store product
    public function storeproduct(Request $request){
        $validate = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required', 
            'price'=>'required',
            'quantity'=>'required',
            'category'=>'required'
        ]);
       
        // product obj
        $product = new Product;

        if($request->hasFile('image')){
            $image = $request->image;
            // creating imagename
            $imagename = time().'.'.$image->getClientOriginalExtension();
            // move image to public folder
            $image->move('product', $imagename);

            //storing imagename to product model
            $product->image = $imagename;
        }

        //save product data
       $product->title = $request->title;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->category = $request->category;
       $product->quantity = $request->quantity;

       // optional dis_price
       if($request->dis_price){
        
            $product->dis_price = $request->dis_price;
       }

       $product->save();
       
       return redirect('/showproduct')->with('message', 'Product added successfully');   
    }


    // show all products
    public function showproduct(){
        $products = Product::all();

        return view('admin.product.show', compact('products'));
    }

    // edit page
    public function editproduct($id){
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }


    // update product
    public function updateproduct(Request $request, $id){

        $validate = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category'=>'required'
        ]);

        $product = Product::find($id);

        $product->title = $validate['title'];
        $product->description = $validate['description'];
        $product->price = $validate['price'];
        $product->quantity = $validate['quantity'];
        $product->category = $validate['category'];

        if($request->dis_price){
            $product->dis_price = $request->dis_price;
        }


        if($request->hasFile('image')){
            // store new image
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $save = $image->move('product', $imagename);

            // remove previous image
            if(file_exists(public_path('product/'.$product->image))){
                
                $filedelete = unlink(public_path('product/'.$product->image));
            }

            // save new filename to product table
            $product->image = $imagename;
        }


        $product->update();

        return redirect('/showproduct')->with('message', 'Product updated successfully');

    }


    // delete product
    public function deleteproduct($id){
        $product = Product::find($id);

        // remove image from public folder
        if(file_exists(public_path('product'.$product->image))){
            $filedelete = unlink(public_path('product/'.$product->image));
        }

        $product->delete();

        return redirect('/showproduct')->with('message', 'product deleted successfully');
    }
}
