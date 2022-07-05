
<!DOCTYPE html>
<html style="height: 100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		button {
			margin-right: 10px;
		}
	</style>
</head>
<body bgcolor="#1363DF">
	@include('components.admin-nav')
	<div class="flex justify-center">
  			<ul class="rounded-lg border border-gray-200 text-gray-900 " style="width: 75%; margin-left: 15em; background: #47B5FF;">
  				<li class="px-6 py-2 border-b border-gray-200 w-full"><a href="/createProd" ><button>Add</button></a></li>
  				<form method="get" action="/deleteProd" id="deleteForm">
    			@foreach ($products as $product)
    			<li class="px-6 py-2 border-b border-gray-200 w-full">
    				<img src="{{asset('uploads/'.$product->image)}}" style="display: inline;" width="50px" height="50px" >
    				<span style="margin-left: 20px;">{{htmlspecialchars_decode($product->name)}}</span>
    				<span style="float: right; margin-top: 10px;">
    					<a href="/updateProd/{{$product->id}}"><button type="button">Update</button></a>
    					<button type="submit" name="id" value="{{$product->id}}" >Delete</button>
    				</span>
    			</li>
    			@endforeach
    			</form>
  			</ul>
  		{{ $products->links() }}
	</div>

	<script type="text/javascript" src="./js/confirm.js"></script>

</body>
</html>