<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>{{$product[0]->name}}</title>
	<style type="text/css">
		button {
			padding: 6px;
			border: 2px solid #06283D;
			color: #DFF6FF;
		}
	</style>
</head>
<body style="text-align:center; font-size: x-large;" bgcolor="#1363DF">
	@include ('layouts.navigation')
	<img src="./uploads/{{$product[0]->image}}" width="300px" height="300px" style="position: absolute; left: 90px; top: 120px; border-radius: 5px;">
	<div style="margin: 0 auto;margin-top: 90px; width: 50%">
		<p style="font-size: xx-large; margin-bottom: 10px">Name:- {{$product[0]->name}} #{{$product[0]->id}}</p>
		<p>Description:- {{$product[0]->description}}</p>
		<p>Price:- {{$product[0]->price}}</p>
		<p>Size:- {{$product[0]->size}}</p>
		<p>Return Policy:- {{$product[0]->return_policy}}</p>
        <div style="margin-top: 40px">
        	<a href="/addItem?id={{$product[0]->id}}&name={{$product[0]->name}}&price={{$product[0]->price}}&image={{$product[0]->image}}"><button type="button" style="margin-right:19px; background-color: #06283D;">Add To Cart</button></a>
        <a href="/details?id={{$product[0]->id}}"><button type="button" style="background-color: #06283D;">More Details</button></a>
        </div>
	</div>
</body>
</html>