<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>My Orders</title>
	<style type="text/css">
		span {
			margin-left: 90px;
		}
	</style>
</head>
<body>
	@include ('layouts.navigation')
	@if (count($orders) == 0)
	<h2>No Orders Yet</h2>
	<a href="/"><button>Order Now</button></a>
	@else 
	@include ('components.ordersView')
	@endif
	<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>