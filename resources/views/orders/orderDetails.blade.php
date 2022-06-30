<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Order {{$order->id}}</title>
</head>
<body>
	<?php $items = unserialize($order->items); $totalItems = 0; ?>
	<p>{{$order->id}}</p>
	<p>{{$order->created_at}}</p>
	<ol>
	@foreach ($items as $item)
		<?php $totalItems += $item['quantity']; ?>
		<li>{{$item['name']}} {{$item['price']}}  {{$item['quantity']}} {{floatval($item['price']) * floatval($item['quantity'])}} </li>
	@endforeach
	</ol>
	<p>{{$totalItems}}</p>
	<p>{{$order->status}}</p>
</body>
</html>