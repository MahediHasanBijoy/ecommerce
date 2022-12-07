@extends('admin.layout.app')


@section('content')
	
	<div class="content-wrapper position-relative">
		<h2 class="text-center display-4">Edit Product</h2>
		<form action="{{url('/updateproduct', $product->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class=" w-50 mx-auto my-3">
				<label for="">Product Title</label><br>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="title" placeholder="Enter Product Title" required value="{{$product->title}}">
				</div>
				@error('title')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class=" w-50 mx-auto my-3">
				<label for="">Description</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="description" placeholder="Enter Description" value="{{$product->description}}">
				</div>
				@error('description')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>

			<div class="w-50 mx-auto my-3">
				<label for="">Product Image</label>
				<div>
					<img width="150px;" src="{{asset('product/'.$product->image)}}" alt="">
				</div>
				<div class="input-group pt-3">
			  		<input type="file" class="form-control bg-white text-dark" name="image" >
				</div>
				@error('image')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Category</label>
				<div class="input-group">
				  	<select name="category" class="form-control bg-white" id="" >
				  		<option value="">--Select Category--</option>
				  		@foreach($categories as $category)
				  		<option value="{{ $category->id }}" {{ $category->id==$product->category? 'selected':null }}>{{ $category->category_name }}</option>
				  		@endforeach
				  	</select>
				</div>
				@error('category')
				  	<span class="text-danger">{{ $message }}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Quantity</label>
				<div class="input-group">
				  	<input type="number" class="form-control bg-white text-dark" name="quantity" placeholder="Enter Quantity" value="{{ $product->quantity }}">
				</div>
				@error('quantity')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label for="">Price</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="price" placeholder="Enter Price" value="{{$product->price}}"> 
				</div>
				@error('price')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="w-50 mx-auto my-3">
				<label>Discount Price</label>
				<div class="input-group">
				  	<input type="text" class="form-control bg-white text-dark" name="dis_price" placeholder="Enter Discount Price" value="{{$product->dis_price}}">
				</div>
				@error('dis_price')
				  	<span class="text-danger">{{$message}}</span>
				@endif
			</div>
			<div class="input-group w-50 mx-auto my-3">
				<button class="btn btn-success form-control" type="submit" id="button-addon2">Update</button>
			</div>
		</form>
	</div>


@endsection