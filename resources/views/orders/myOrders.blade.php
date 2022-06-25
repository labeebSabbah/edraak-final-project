<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>My Orders</title>
</head>
<body>
	@if (count($orders) == 0)
	<h2>No Orders Yet</h2>
	<a href="/"><button>Order Now</button></a>
	@else 
	<ol>
		@foreach ($orders as $item)
		<li>{{$item->id}} {{$item->created_at}}  {{$item->status}} {{$item->total}}</li>
		@endforeach
	</ol>
	@endif
</body>
</html>