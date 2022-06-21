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
			<input style="color: black;" class="w-full" type="text" name="name" required>
		</div>

		<div class="mt-4">
			<label for="desc">Enter Description</label><br>
			<input style="color: black;" class="w-full" type="text" name="desc" required>
		</div>
		
		<div class="mt-4">
			<label for="price">Enter Price</label><br>
			<input style="color: black;" class="w-full" type="number" name="price" id="prodPrice" step="0.01" required>
		</div>

		<div class="mt-4">
			<label for="size">Select Size</label><br>
			<select style="color: black;" class="w-full" name="size">
				<option></option>
				<option>S</option>
				<option>M</option>
				<option>L</option>
				<option>XL</option>
				<option>XXL</option>
			</select>
		</div>

		<div class="mt-4">
			<label for="return">Enter Return Policy (optional)</label><br>
			<input style="color: black;" class="w-full" type="text" name="return">
		</div>

		<div class="mt-4"> 
			<label for="image">Image</label><br>
			<input style="color: black;" class="w-full" type="file" name="image" required>
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
		<div class="mt-4">
			<button type="submit" class="w-full bg-green-500 py-3">Add Product</button><br>
			<button class="w-full bg-red-600 py-3" onclick="history.back()">Cancel</button>
		</div>
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