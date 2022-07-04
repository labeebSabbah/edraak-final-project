<?php 
	use Illuminate\Support\Facades\DB;

	$main_cats = DB::select('SELECT * FROM main_categories');
	if ($id = DB::table('sub_categories')->where('name', $name)->value('main_id')) {
		$sub_cats = DB::select("SELECT * FROM sub_categories WHERE main_id = {$id}");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Category</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<style type="text/css">
		#updateForm {
			margin-top: 10%;
		}
	</style>
</head>
<body style="color: white;" bgcolor="#1363DF">
	<form method="get" action="/updateCat" id="updateForm" class="container m-auto w-6/12">
		@csrf
		<div>
			<label for="name">Enter Name</label><br>
			<input style="color: black;" class="w-full" type="text" name="new_name" id="new_name" required>
		</div>
		<div class="mt-4">
			<button type="submit" class="w-full bg-green-500 py-3" name="name" value="{{$name}}">Update Category</button><br>
			<button class="w-full bg-red-600 py-3" onclick="history.back()">Cancel</button>
		</div>
	</form>
	<script type="text/javascript">

		const new_name = document.getElementById('new_name');
		const updateForm = document.getElementById('updateForm');

		updateForm.addEventListener('submit', function (e) {
			var error = '';
			if (new_name.value == "") {
				error += "Enter A Name";
			} else {
				 @foreach ($main_cats as $item)

				 if (new_name.value == '{{$item->name}}') {
				 	error += new_name.value + " Already Exists";
				 }

				 @endforeach

				 @if (isset($sub_cats))

				 @foreach ($sub_cats as $item)

				 if (new_name.value == '{{$item->name}}') {
				 	error += new_name.value + " Already Exists";
				 }

				 @endforeach

				 @endif
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