@extends('admin.layout.app')


@section('content')

	<div class="content-wrapper" style="overflow-x:auto;">
		<h3 class="text-center">All Orders</h3>
		<table class="table w-100" >
			<thead>
				<tr>
					<th>#sl</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Image</th>
					<th style=" word-break: break-all;">Payment Status</th>
					<th style=" word-break: break-word !important;">Delivery Status</th>
					<th>Print</th>
				</tr>
			</thead>
			<tbody>
				@php($sl = 1)
				@foreach($orders as $order)
				<tr>
					<td>{{$sl++}}</td>
					<td>{{$order->name}}</td>
					<td>{{$order->email}}</td>
					<td>{{$order->phone}}</td>
					<td>{{$order->address}}</td>
					<td>{{$order->product_title}}</td>
					<td>{{$order->quantity}}</td>
					<td>{{$order->price}}</td>
					<td><img src="{{asset('/product/'.$order->image)}}" alt=""></td>
					<td>{{$order->payment_status}}</td>
					<td>
						@if($order->delivery_status=='processing')
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{$order->delivery_status}}</button type="button">
						@else
							<p>Delivered</p>
						@endif

					</td>
					<td>
						<a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Pdf</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Confirm Delivery Status</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Are you sure to update delivery status?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <a href="{{url('delivered', $order->id)}}"  class="btn btn-primary">Yes</a>
	      </div>
	    </div>
	  </div>
	</div>

@endsection