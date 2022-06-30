<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Search</title>
</head>
<body>
	@if ($products)
	@include('components.productsView')
	@else
	<h2>No Product Match The Search</h2>
	@endif
</body>
</html>