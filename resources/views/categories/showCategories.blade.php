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
					echo "<li name='{$name}'>{$name}</li>
					<button type='submit' name='name' value='{$name}'>Delete</button>";
				}
			?>
		</form>
	</ol>
</body>
</html>