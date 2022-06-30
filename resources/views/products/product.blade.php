<?php $product = DB::table('products')->where('id', '=', $id);
 $subCats = unserialize($product->sub_categories); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$product->name}}</title>
</head>
<body>
	<h2>{{$product->name}} #{{$product->id}}</h2>
	<h2>{{$product->description}}</h2>
	<h2>{{$product->price}}</h2>
	<img src="./uploads/{{product->image}}">
	<h2>{{$product->size}}</h2>
	<h2>{{$product->return_policy}}</h2>
	<h2>$product->main_category</h2>
	<h2>@foreach ($subCats as $item) <p>$item</p> @endforeach</h2>
</body>
</html>