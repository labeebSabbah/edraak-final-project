<?php 
session_start();
$cart = $_SESSION['cart'] ?? array();
$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<style type="text/css">
		table, th, td {
			border: 1px solid black;
		}
	</style>
</head>
<body style="text-align: center;font-size: x-large;" bgcolor="#1363DF">
	<?php if (isset($message)) {
		echo "<p>{$message}</p>";
	} ?>
	@include ('layouts.navigation')
	<div style="margin-left: 50px">
		@include ('components.backIcon')
	</div>
	@if (count($cart) == 0)
	<div style="margin-top: 200px;">
		<h2 style="margin-bottom: 30px;">Your Cart Is Empty</h2>
		<a href="/"><button type="button" style="border: 2px solid #06283D; background: #06283D; padding: 6px; color: #DDF9DF;">Add Products</button></a>
	</div>
	@else
		<table border="1px solid black" style="margin: auto; background: #47B5FF; border-radius: 7px;">
			<tr>
				<th>ID</th><th>Photo</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th><th></th>
			</tr>
			@foreach ($cart as $item)
			<?php $total += $item['quantity'] * floatval($item['price']); ?>
			<tr>
				<td>{{$item['id']}}</td><td><img src="{{asset('uploads/'.$item['image'])}}" width="50px" height="50px"></td><td>{{$item['name']}}</td><td>{{$item['price']}}$</td>
				<td>{{$item['quantity']}}</td><td>{{$item['quantity'] * floatval($item['price'])}}$</td>
				<td><a href="/removeItem?id={{$item['id']}}"><button type="button">Remove From Cart</button></a></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="4">
					<span> Total = {{$total}}$</span>
				</td>
				<td colspan="2">
					<a href="/checkout"><button type="button">Checkout</button></a>
				</td>
			</tr>
		</table>
		
	@endif
</body>
</html>