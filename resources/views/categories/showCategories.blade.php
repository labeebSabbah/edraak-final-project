<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
</head>
<body>
	<ol>
		<form method="get" action="/deleteCat" class="deleteForms">
			@foreach ($mainCat as $item)
				<li name='{{$item->name}}' class='names'>{{$item->name}}</li>
				<button type='submit' name='name' value='{{$item->name}}'>Delete</button>
				<a href="/updateCat/{{$item->name}}">Update</a>
			@endforeach
		</form>
	</ol>
	<ol>
		<form method="get" action="/deleteCat" class="deleteForms">
			@foreach ($subCat as $item)
				<li name='{{$item->name}}' class='names'>{{$item->name}}</li>
				<button type='submit' name='name' value='{{$item->name}}'>Delete</button>
				<a href='/updateCat/{{$item->name}}'>Update</a>
			@endforeach
		</form>
	</ol>
	<form method="get" action="/createCat" id="addForm">
		<label for="name">Enter Category Name : </label>
		<input type="text" name="name" id="name"> <br>
		<label for="main">Is It A Main Category ?</label>
		<input type="radio" name="main" value="1">Yes
		<input type="radio" name="main" value="0" checked>No
		<button type="submit">Add</button>
	</form>

	<script type="text/javascript">

			const name = document.getElementById('name');
			const addForm = document.getElementById('addForm');
			const names = document.getElementsByClassName('names');
			const deleteForms = document.getElementsByClassName('deleteForms');

			addForm.addEventListener('submit', function (e) {
				let error = '';
				if (name.value == "") {
					error += "Enter A Name";
				} else {
				for (let i = 0; i < names.length; i++) {
					if (name.value == names[i].innerHTML) {
						error += names[i].innerHTML + " Already Exists";
						break;
					}
				}}
				if (error) {
					e.preventDefault();
					alert(error);
				} else {
					alert("Category Added Successfully");
				}
			});

			for (let i = 0; i < deleteForms.length; i++) {
				deleteForms[i].addEventListener('submit', function (e) {
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
			}
	</script>
</body>
</html>