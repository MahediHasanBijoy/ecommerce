<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class OrderController extends Controller
{
    // show all orders in admin panel
    public function index(){
        // all orders
        $orders = Order::all();

        return view('admin.order.show', compact('orders'));
    }


    // cash on delivery 
    public function cash_on_delivery(){
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
            $order->payment_status = 'pending';
            $order->delivery_status = 'processing';

            $order->save();

            // delete data from cart
            $cart->delete();
  
        }
        
        // all orders
        $orders = Order::where('user_id', $user_id)->get();
        
        return view('frontend.order_details', compact('orders'));
    }



    // update delivery status
    public function delivery_status($id){
        $order = Order::find($id);

        $order->delivery_status = 'delivered';
        $order->payment_status = 'paid';

        $order->save();

        return back();
    }


    // print pdf for an order details
    public function print_pdf($id){

        $order = Order::find($id);

        $pdf = PDF::loadView('admin.order.pdf', compact('order'));

        return $pdf->download('order_details.pdf');
    }




    // view mail create form 
    public function mail($id){
        
        $order = Order::find($id);

        return view('admin.order.send_mail', compact('order'));
    }


    // create mail
    public function create_mail(Request $request, $id){
        // order object
        $order = Order::find($id);

        // details array for sending as a parameter to constructor of SendEmailNotification instance
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        // use Notifiable trait in Order model 
        // send notification to $order->email
        Notification::send($order, new SendEmailNotification($details));

        return redirect('/orders');
    }
}
