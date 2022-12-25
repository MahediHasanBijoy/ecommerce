<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Print</title>
</head>
<body>
	<div>
		<h2>Order details</h2>

		<span>Customer Name: {{$order->name}}</span>
	</div>
	<div>
		<span>Customer Email: {{$order->email}}</span>
	</div>
	<div>
		<span>Customer Phone: {{$order->phone}}</span>
	</div>
	<div>
		<span>Customer Address: {{$order->address}}</span>
	</div>
	<div>
		<span>Customer Phone: {{$order->phone}}</span>
	</div>
	<div>
		<span>Product Name: {{$order->product_title}}</span>
	</div>
	<div>
		<span>Quantity: {{$order->quantity}}</span>
	</div>
	<div>
		<span>Price: {{$order->price}}</span>
	</div>
	
	

</body>
</html>