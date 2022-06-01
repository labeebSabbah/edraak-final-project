<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add A New Category</title>
</head>
<body>
	<form method="get" action="/createCat/add">
		<label for="name">Enter Category Name : </label>
		<input type="text" name="name"> <br>
		<label for="main">Is It A Main Category ?</label>
		<input type="radio" name="main" value="1">Yes
		<input type="radio" name="main" value="2" checked>No
		<button type="submit">Add</button>
	</form>
</body>
</html>