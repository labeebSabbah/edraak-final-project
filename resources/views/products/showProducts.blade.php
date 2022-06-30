<!DOCTYPE html>
<html style="height: 100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<style type="text/css">
		#main {
			margin: auto;
			width: 50%;
			height: 100%;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	@include('components.admin-nav')
	<div class="flex justify-center" id="main">
		<a href="/createProd"><button>Add</button></a>
		<form method="get" action="/deleteProd" id="deleteForm">
  			<ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900 container">
    			@foreach ($products as $product)
    			<li class="px-6 py-2 border-b border-gray-200 w-full">
    				<img src="{{asset('uploads/'.$product->image)}}">
    				<span style="margin-left: 20px;">{{$product->name}}</span>
    				<span style="float: right;">
    					<a href="/updateProd/{{$product->name}}"><button>Update</button></a>
    					<button type="submit" name="name" value="{{$product->name}}">Delete</button>
    				</span>
    			</li>
  			</ul>
  		</form>
	</div>
	

	{{ $products->links() }}
</div>

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