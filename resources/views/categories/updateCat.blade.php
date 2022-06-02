<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Category</title>
</head>
<body>
	<form method="get" action="/updateCat" id="updateForm">
		<input type="text" name="new_name" id="name">
		<button type="submit" name="name" value='{{$name}}'>Update</button>
	</form>
</body>
</html>