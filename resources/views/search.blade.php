<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Search</title>
</head>
<body>
	@include ('layouts.navigation')
	<form method="get" action="/search" style="width: 20%; height: 100%; text-align: center;">
		<p style="">Filter</p>
	</form>
	@if (count($products) != 0)
	<div style="width: 80%; margin-left: 20%;">@include('components.productsView')</div>
	@else
	<h2>No Product Match The Search</h2>
	@endif
	<script type="text/javascript" src="./js/app.js"></script>
</body>
</html>