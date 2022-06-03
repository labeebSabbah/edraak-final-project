<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
</head>
<body>
	<a href="/createProd">Add</a>
	<div class="container">
		@foreach ($products as $product)
			{{$product->name}}
			{{$product->image}}
		@endforeach
	</div>

	{{ $products->links() }}

</body>
</html>