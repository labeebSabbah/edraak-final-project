<?php 
use Illuminate\Support\Facades\DB;
$subCats = DB::select("SELECT * from sub_categories where main_id = {$_GET['id']}");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Add Sub Category</title>
	<style type="text/css">
		#createForm {
			margin-top: 10%;
		}
	</style>
</head>
<body style="color: white;" bgcolor="#1363DF">
	<form method="get" action="/createSub/add" id="createForm" class="container m-auto w-6/12">
		@csrf
		<div>
			<label for="name">Enter Name</label><br>
			<input style="color: black;" class="w-full" type="text" name="name" id="name" required>
		</div>
		<div class="mt-4">
			<button type="submit" class="w-full bg-green-500 py-3" name="id" value="{{$_GET['id']}}">Add Category</button><br>
			<button class="w-full bg-red-600 py-3" onclick="history.back()">Cancel</button>
		</div>
	</form>
	<script type="text/javascript">
		const createForm = document.getElementById('createForm');
		const input = document.getElementById('name');
		createForm.addEventListener('submit',function (e) {
			@foreach ($subCats as $item)
			if ("<?php echo htmlspecialchars_decode($item->name) ?>" == input.value) {
				e.preventDefault();
				alert('<?php echo htmlspecialchars_decode($item->name) ?> Already Exists');
			}
			@endforeach
		});
	</script>
</body>
</html>