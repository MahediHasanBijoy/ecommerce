@extends('admin.layout.app')


@section('content')

	<div class="content-wrapper" style="overflow-x:auto;">
		<h3 class="text-center">All Orders</h3>
		<!-- Seach div -->
		<div class="m-2 p-2">
			<form action="{{url('search_order')}}" method="get">
				@csrf
				<div class="form-group">
					<input type="text" placeholder="Seach for order" name="search_order">
					<input type="submit" class="btn btn-outline-secondary" value="Search">
				</div>

			</form>
		</div>
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
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				@if(!$orders->isEmpty())
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
							<button type="button" class="btn btn-primary delivery_status" data-toggle="modal" data-target="#exampleModal" value="{{$order->id}}">{{$order->delivery_status}}</button type="button">
						@else
							<p>Delivered</p>
						@endif

					</td>
					<td>
						<a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Pdf</a>
					</td>
					<td>
						<a href="{{url('mail', $order->id)}}" class="btn btn-info">Send Mail</a>
					</td>
				</tr>
				@endforeach

				@else
					<tr>
						<td colspan="13" class="text-center text-white">No data found</td>
					</tr>

				@endif
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
	        <a href=""  class="btn btn-primary delivery_modal">Yes</a>
	      </div>
	    </div>
	  </div>
	</div>

@endsection