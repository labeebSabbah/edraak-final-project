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
</head>
<body>
	@if (count($cart) == 0)
		<h2>Your Cart Is Empty</h2>
		<a href="/"><button>Add Products</button></a>
	@else
		<ol>
			@foreach ($cart as $item)
			<?php $total += $item['quantity'] * floatval($item['price']); ?>
			<li>{{$item['id']}} {{$item['name']}} {{$item['quantity']}} <a href="/removeItem?id={{$item['id']}}">Remove From Cart</a></li>
			@endforeach
		</ol>
		<p>Total = {{$total}}</p>
		<a href="/checkout"><button>Checkout</button></a>
	@endif
</body>
</html>