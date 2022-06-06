<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
</head>
<body>
	<a href="/createProd">Add</a>
	<ol class="container">
		<form method="POST" action="/deleteProd" id="deleteForm">
		@foreach ($products as $product)
			<li>{{$product->name}}</li>
			<button type="submit" name="name" value="{{$product}}">Delete</button>
			<img src="{{asset('uploads/'.$product->image)}}">
		@endforeach
		</form>
	</ol>

	{{ $products->links() }}

</body>
</html>