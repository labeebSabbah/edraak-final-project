<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
</head>
<body>
	<a href="/createMain">Add</a>
	<ol>
		<form method="get" action="/deleteCat" class="deleteForms">
			@foreach ($mainCat as $item)
				<li name='{{$item->name}}' class='names'>{{$item->name}}</li><a href="/createSub?id={{$item->id}}">Add</a>
				<button type='submit' name='name' value='{{$item->id}}'>Delete</button>
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

	<script type="text/javascript">

			const names = document.getElementsByClassName('names');
			const deleteForms = document.getElementsByClassName('deleteForms');

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