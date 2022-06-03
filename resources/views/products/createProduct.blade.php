<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add A New Product</title>
</head>
<body>
	<form method="get" action="/createProd/add" id="createForm" enctype="multipart/form-data">
		<label for="name">Enter Name</label>
		<input type="text" name="name" required><br>

		<label for="desc">Enter Description</label>
		<input type="text" name="desc" required><br>

		<label for="price">Enter Price</label>
		<input type="number" name="price" required><br>

		<label for="size">Enter Size</label>
		<input type="text" name="size"><br>

		<label for="return">Enter Return Policy (optional)</label>
		<input type="text" name="return"><br>

		<label for="image">Image</label>
		<input type="file" name="image" required>

		<button type="submit">Add Product</button>
	</form>
</body>
</html>