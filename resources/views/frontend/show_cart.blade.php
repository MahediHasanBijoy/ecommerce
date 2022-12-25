<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>


		<div class="hero_area">
         	<!-- header section strats -->
            @include('frontend/includes/header')
         	<!-- end header section -->
        		

        	@if(!$cart->isEmpty())
        	<!-- content -->
	        <div class="col-sm-6 col-md-6 col-lg-6  mx-auto mt-5">
	        	<h3 class="text-center pb-3">Your Cart</h3>
	        	<table class="table table-bordered text-center ">
	        		<thead>
	        			<tr>
	        				<th>#sl</th>
	        				<th>Product Name</th>
	        				<th>Price</th>
	        				<th>Quantity</th>
	        				<th>Image</th>
	        				<th>Action</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			@php
	        				$sl=1;
	        				$totalprice = 0;
	        			@endphp
	        			@foreach($cart as $cart)
	        			<tr>
	        				<td>{{$sl++}}</td>
	        				<td>{{$cart->product_title}}</td>
	        				<td>{{$cart->price}}</td>
	        				<td>{{$cart->quantity}}</td>
	        				<td><img width="50%" src="{{asset('product/'.$cart->image)}}" alt=""></td>
	        				<td class="align-middle">
	        					<a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a>
	        				</td>
	        			</tr>

	        			@php($totalprice += $cart->price)

	        			@endforeach

	        			<tr>
	        				<td colspan="5">Total price</td>
	        				<td>{{ $totalprice }}</td>
	        			</tr>
	        		</tbody>
	        	</table>

	        	<div class="text-center mt-5">
	        		<h3>Proceed to pay</h3>
	        		<div class="mt-3">
	        			<a href="{{url('cod')}}" class="btn btn-danger">Cash on delivery</a>
	        		</div>

	        		<div class="mt-3 mb-3">
	        			<a href="{{ url('cardpay', $totalprice)}}" class="btn btn-danger">Pay with card</a>
	        		</div>
	        	</div>
	        </div>
	      @else
	      <div class="mx-auto mt-5">
	      	<div class="alert alert-danger">
	      		<h4>Your cart is empty</h4>
	      	</div>
	      </div>
	      @endif
		</div>




   	 <!-- footer start -->
         @include('frontend.includes.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Famms</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('frontend/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('frontend/js/custom.js')}}"></script>
   </body>
</html>