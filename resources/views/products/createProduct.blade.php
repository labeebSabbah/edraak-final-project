<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add A New Product</title>
</head>
<body>
	<form method="post" action="/createProd/add" id="createForm" enctype="multipart/form-data">
		@csrf
		<label for="name">Enter Name</label>
		<input type="text" name="name" id="prodName" required><br>

		<label for="desc">Enter Description</label>
		<input type="text" name="desc" id="prodDesc" required><br>

		<label for="price">Enter Price</label>
		<input type="number" name="price" id="prodPrice" required><br>

		<label for="size">Enter Size</label>
		<input type="text" name="size"><br>

		<label for="return">Enter Return Policy (optional)</label>
		<input type="text" name="return"><br>

		<label for="image">Image</label>
		<input type="file" name="image" required>

		<button type="submit">Add Product</button>
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