<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<a href="/createProd">Add</a>
	<ol class="container">
		<form method="get" action="/deleteProd" id="deleteForm">
		@foreach ($products as $product)
			<li>{{$product->name}}</li>
			<button type="submit" name="name" value="{{$product->name}}">Delete</button>
			<a href="/updateProd/{{$product->name}}">Update</a>
			<img src="{{asset('uploads/'.$product->image)}}">
		@endforeach
		</form>
	</ol>

	{{ $products->links() }}

	<script type="text/javascript">

		const deleteForm = document.getElementById('deleteForm');

		deleteForm.addEventListener('submit', function (e) {
			var error = '';
			var choice = confirm('Are You Sure That You Want To Delete It ?');
			if (!choice) {
				e.preventDefault();
			} else {
				alert("Category Deleted Successfully");
			}
			if (error) {
				alert(error);
			}
		});
	</script>

</body>
</html>