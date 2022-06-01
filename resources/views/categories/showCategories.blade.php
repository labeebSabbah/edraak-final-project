<?php 
	use Illuminate\Support\Facades\DB;

	$mainCat = DB::select('SELECT * FROM categories WHERE is_main = true');
	$subCat = DB::select('SELECT * FROM categories WHERE is_main = false');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
</head>
<body>
	<ol>
		<form method="get" action="/deleteCat">
			<?php 
				foreach ($mainCat as $item) {
					$name = $item->name;
					echo "<li name='{$name}' class='name'>{$name}</li>
					<button type='submit' name='name' value='{$name}'>Delete</button>";
				}
			?>
		</form>
	</ol>
	<ol>
		<a href="/createCat">Add</a>
		<form method="get" action="/deleteCat">
			<?php 
				foreach ($subCat as $item) {
					$name = $item->name;
					echo "<li name='{$name} class='names'>{$name}</li>
					<button type='submit' name='name' value='{$name}'>Delete</button>";
				}
			?>
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
		window.onload(function () {

			const name = document.getElementById('name');
			const form = document.getElementById('addForm');
			const names = document.getElementsByClassName('names');

			form.addEventListener('submit', function (e) {
				let error = '';
				if (name.value == '') {
					error += "Enter A Name";
				}
				for (let i = 0; i < names.length; i++) {
					if (name.value == names[i].innerHTML) {
						e.preventDefault();
						error += names[i].innerHTML + " Already Exists";
					}
				}
				if (error) {
					alert(error);
				}
			});
		});
	</script>
</body>
</html>