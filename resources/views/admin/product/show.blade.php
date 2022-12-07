
@extends('admin.layout.app')


@section('content')
	
	<div class="content-wrapper position-relative">

		@if(session()->has('message'))

			<div class="message alert alert-success alert-sm w-25 position-absolute" style="top:0; right: 0;">
				{{session('message')}}
			</div>

		@endif


		<h2>All Products</h2>

		<table class="table bordered">
			<thead>
				<tr>
					<th>#sl</th>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>Image</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Discount Price</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@if($products->isEmpty())
					<tr>
						<td class="text-center" colspan="10">No product available</td>
					</tr>
				@endif
				@php($sl=1)
				@foreach($products as $product)
				<tr>
					<td>{{$sl++}}</td>
					<td>{{$product->title}}</td>
					<td>
						@if(strlen($product->description >25))
							{{substr($product->description, 0, 25).'...'}} 
						@else
							{{$product->description}}
						@endif
					</td>
					<td>{{$product->category()->first()->category_name}}</td>
					<td><img src="{{asset('product/'.$product->image)}}" alt=""></td>
					<td>{{$product->quantity}}</td>
					<td>{{$product->price}}</td>
					<td>{{$product->dis_price}}</td>
					<td>
						<a href="{{url('/editproduct', $product->id)}}" class="btn btn-info btn-sm">Edit</a>
					</td>
					<td>
						<a href="{{url('/deleteproduct', $product->id)}}" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>


@endsection