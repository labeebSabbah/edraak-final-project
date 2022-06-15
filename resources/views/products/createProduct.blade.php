<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Add A New Product</title>
</head>
<body style="color: white" bgcolor="black">
	<form method="post" action="/createProd/add" id="createForm" enctype="multipart/form-data" class="container m-auto w-6/12">
		@csrf
		<div>
			<label for="name">Enter Name</label><br>
			<input class="w-full" type="text" name="name" id="prodName" required>
		</div>

		<div class="mt-4">
			<label for="desc">Enter Description</label><br>
			<input class="w-full" type="text" name="desc" id="prodDesc" required>
		</div>
		
		<div class="mt-4">
			<label for="price">Enter Price</label><br>
			<input class="w-full" type="number" name="price" id="prodPrice" required>
		</div>

		<div class="mt-4">
			<label for="size">Enter Size</label><br>
			<input class="w-full" type="text" name="size">
		</div>

		<div class="mt-4">
			<label for="return">Enter Return Policy (optional)</label><br>
			<input class="w-full" type="text" name="return">
		</div>

		<div class="mt-4"> 
			<label for="image">Image</label><br>
			<input class="w-full" type="file" name="image" required>
		</div>

		<div class="mt-4">
			@foreach ($mainCats as $item)
			<label for="mainCat">{{$item->name}}</label>
			<input type="radio" name="mainCat" value="{{$item->name}}">
			@endforeach
		</div>

		<div class="mt-4">
			@foreach ($subCats as $item)
			<label for="subCats[]">{{$item->name}}</label>
			<input type="checkbox" name="subCats[]" value="{{$item->name}}">
			@endforeach
		</div>

		<button type="submit" class="w-full bg-green-500">Add Product</button><br>
		<a href="/products"><button class="w-full bg-red-600">Cancel</button></a>
	</form>

	<script type="text/javascript">
		
		const prodPrice = document.getElementById('prodPrice');

		addForm.addEventListener('submit', function (e) {
			let error = '';
			if (prodPrice.value <= 0) {
				error += "Invalid Price";
			}
			if (error) {
				e.preventDefault();
				alert(error);
			} else {
				alert("Product Added Successfully");
			}
		});

	</script>
</body>
</html>