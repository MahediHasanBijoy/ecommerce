@extends('admin.layout.app')


@section('content')


	<div class="content-wrapper">
		
		<div class="text-center">
			<span><b style="font-size: 22px;">Send Email to </b>{{$order->email}}</span>
		</div>
		<div class="w-50 mx-auto mt-5">
			<form action="{{url('create_mail', $order->id)}}" method="post">
				@csrf
				<div class="form-group">
					<label class="w-25" for="">Greeting:</label>
					<input class="form-control text-white " type="text" name="greeting">
				</div>
				<div class="form-group">
					<label class="w-25" for="">Email Firstline:</label>
					<input class="form-control text-white" type="text" name="firstline">
				</div>
				<div class="form-group">
					<label class="w-25" for="">Email Body:</label>
					<input class="form-control text-white" type="text" name="body">
				</div>
				<div class="form-group">
					<label class="w-25" for="">Email Button:</label>
					<input class="form-control text-white" type="text" name="button">
				</div>
				<div class="form-group">
					<label class="w-25" for="">Email Url:</label>
					<input class="form-control text-white" type="text" name="url">
				</div>
				<div class="form-group">
					<label class="w-25" for="">Last Line:</label>
					<input class="form-control text-white" type="text" name="lastline">
				</div>
				<div class="form-group">
					<input type="submit" value="Send Email" class="btn btn-primary form-control">
				</div>
			</form>
		</div>
	</div>



@endsection