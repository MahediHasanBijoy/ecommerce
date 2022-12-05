@extends('admin.layout.app')


@section('content')

<div class="content-wrapper position-relative">
	@if(session()->has('message'))

		<div class="message alert alert-success alert-sm w-25 position-absolute" style="top:0; right: 0;">
			{{session('message')}}
		</div>

	@endif

	<div class="text-center pt-1">
		<h2 class="display-4">Add Category</h2>
		<form action="{{url('/add_category')}}" method="post">
			@csrf
			<div class="input-group w-50 mx-auto my-3">
			  <input type="text" class="form-control text-white" name="category_name" placeholder="Enter Category Name" aria-describedby="button-addon2">
			  <div class="input-group-append">
			    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add Category</button>
			  </div>
			</div>
		</form>
	</div>
</div>
	

@endsection