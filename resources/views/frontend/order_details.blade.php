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
        		
        	<!-- content -->
	        <div class="col-sm-6 col-md-6 col-lg-6  mx-auto mt-5">
	        	<h3 class="text-center pb-3">Your Order Details</h3>
	        	<table class="table table-bordeP text-center ">
	        		<thead>
	        			<tr>
	        				<th>#sl</th>
	        				<th>Product Name</th>
	        				<th>Price</th>
	        				<th>Quantity</th>
	        				<th>Image</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			@php
	        				$sl=1;
	        				$totalprice = 0;
	        			@endphp
	        			@foreach($orders as $order)
	        			<tr>
	        				<td>{{$sl++}}</td>
	        				<td>{{$order->product_title}}</td>
	        				<td>{{$order->price}}</td>
	        				<td>{{$order->quantity}}</td>
	        				<td><img width="50%" src="{{asset('product/'.$order->image)}}" alt=""></td>
	        			</tr>

	        			@php($totalprice += $order->price)

	        			@endforeach

	        			<tr>
	        				<td colspan="2">Total price</td>
	        				<td>{{ $totalprice }}</td>
	        			</tr>
	        		</tbody>
	        	</table>

	        	
	        </div>
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