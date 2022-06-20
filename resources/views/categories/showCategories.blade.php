<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
</head>
<body>
	<ol>
		<form method="get" action="/deleteMain" class="deleteForms">
			@foreach ($mainCat as $item)
				<li name='{{$item->name}}' class='names'>{{$item->name}}</li><a href="/createSub?id={{$item->id}}">Add</a>
				<button type='submit' name='name' value='{{$item->name}}'>Delete</button>
				<a href="/updateCat/{{$item->name}}">Update</a>
			@endforeach
		</form>
	</ol>
	<ol>
		<form method="get" action="/deleteSub" class="deleteForms">
			@foreach ($subCat as $item)
				<li name='{{$item->name}}' class='names'>{{$item->name}}</li>
				<button type='submit' name='name' value='{{$item->name}}'>Delete</button>
				<a href='/updateCat/{{$item->name}}'>Update</a>
			@endforeach
		</form>
	</ol>

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