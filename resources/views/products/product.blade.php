<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>{{$product[0]->name}}</title>
</head>
<body style="text-align:center">
	@include ('layouts.navigation')
	<p>{{$product[0]->name}} #{{$product[0]->id}}</p>
	<p>{{$product[0]->description}}</p>
	<p>{{$product[0]->price}}</p>
	<img src="./uploads/{{$product[0]->image}}">
	<p>{{$product[0]->size}}</p>
	<p>{{$product[0]->return_policy}}</p>
</body>
</html>