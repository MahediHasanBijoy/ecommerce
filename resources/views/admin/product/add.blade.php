@extends('admin.layout.app')


@section('content')
	
	<div class="content-wrapper position-relative">
		@if(session()->has('message'))

			<div class="message alert alert-success alert-sm w-25 position-absolute" style="top:0; right: 0;">
				{{session('message')}}
			</div>

		@endif


		<h2 class="text-center display-4">Add Product</h2>
		<form action="{{url('/storeproduct')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class=" w-50 mx-auto my-3">
				<label for="">Product Title</label><br>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="title" placeholder="Enter Product Title" required value="{{old('title')}}">
				</div>
				@error('title')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class=" w-50 mx-auto my-3">
				<label for="">Description</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="description" placeholder="Enter Description" value="{{old('description')}}">
				</div>
				@error('description')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>

			<div class="w-50 mx-auto my-3">
				<label for="">Product Image</label>
				<div class="input-group">
			  		<input type="file" class="form-control bg-white text-dark" name="image" >
				</div>
				@error('image')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Category</label>
				<div class="input-group">
				  	<select name="category" class="form-control bg-white" id="" value="{{old('category')}}">
				  		<option value="">--Select Category--</option>
				  		@foreach($categories as $category)
				  		<option value="{{$category->id}}">{{$category->category_name}}</option>
				  		@endforeach
				  	</select>
				</div>
				@error('category')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Quantity</label>
				<div class="input-group">
				  	<input type="number" class="form-control bg-white text-dark" name="quantity" placeholder="Enter Quantity" value="{{old('quantity')}}">
				</div>
				@error('quantity')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Price</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="price" placeholder="Enter Price" value="{{old('price')}}"> 
				</div>
				@error('price')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label>Discount Price</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="dis_price" placeholder="Enter Discount Price" value="{{old('dis_price')}}">
				</div>
				@error('dis_price')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="input-group w-50 mx-auto my-3">
				<button class="btn btn-success form-control" type="submit" id="button-addon2">Save</button>
			</div>
		</form>
	</div>


@endsection