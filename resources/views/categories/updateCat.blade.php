<?php 
	use Illuminate\Support\Facades\DB;

	$cats = DB::select('SELECT * FROM categories');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Category</title>
</head>
<body>
	<form method="get" action="/updateCat" id="updateForm">
		<input type="text" name="new_name" id="new_name">
		<button type="submit" name="name" value='{{$name}}'>Update</button>
	</form>
	<script type="text/javascript">

		const new_name = document.getElementById('new_name');
		const updateForm = document.getElementById('updateForm');

		updateForm.addEventListener('submit', function (e) {
			var error = '';
			if (new_name.value == "") {
				error += "Enter A Name";
			} else {
				// @foreach ($cats as $item)
				// if (new_name.value == {{$item->name}}) {
				// 	error += $new_name.value + " Already Exists";
				// 	break;
				// }
				// @endforeach
			}

			if (error) {
				e.preventDefault();
				alert(error);
			} else {
				alert("Updated Successfully");
			}

		});

	</script>
</body>
</html>