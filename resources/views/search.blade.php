<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/app.css">
	<title>Search</title>
	<style type="text/css">
		input,select {
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
	@include ('layouts.navigation')
	<form method="get" action="/search" style="width: 20%; height: 100%; border: 1px solid black; text-align: center; position: fixed; padding-top: 20px;" id="filter">

		<p style="font-size: x-large; margin-bottom: 20px;">Filter</p>

		<label for="name">Name:-</label>
		<input type="text" name="search" style="width: 90%;" value="{{$search}}" class="mt-4"><br>

		<label for="mainCat">Category:-</label>
		<select name="mainCat" style="width: 90%;" class="mt-4">
			<option value="">Categories</option>
			@foreach ($mainCats as $item)
			<option value="{{$item->id}}" <?php if ($mainCat == $item->id) {echo 'selected';} ?>>{{$item->name}}</option>
			@endforeach
		</select>

		<label>Price:-</label><br>
		<input type="number" name="min" min="0" style="width: 35%;" placeholder="Min" class="mt-4" value="{{$min}}" step="0.1">
		&nbsp&nbsp
		<span>~</span>
		&nbsp
		<input type="number" name="max" min="0" style="width: 35%;" placeholder="Max" class="mt-4" value="{{$max}}" step="0.1"><br>

		<label for="subCat">Sub-Category:-</label>
		<select name="subCat" style="width: 90%;" class="mt-4">
			<option value="">Sub-Categories</option>
			@foreach ($subCats as $item)
			<option value="{{$item->name}}" <?php if ($subCat == $item->name) {echo 'selected';} ?>>{{$item->name}}</option>
			@endforeach
		</select>
	</form>
	@if (count($products) != 0)
	<div style="width: 80%; margin-left: 20%;">@include('components.productsView')</div>
	@else
	<p style="font-size: x-large; position: absolute; right: 25%; top: 45%;">No Product Match The Search</p>
	@endif
	<script type="text/javascript" src="./js/app.js"></script>
	<script type="text/javascript">
		
		const children = document.getElementById('filter').childNodes;

		for (var i = 0; i < children.length; i++) {
			children[i].addEventListener('change', function (e) {
				e.preventDefault();
				this.closest('form').submit();
			});
		}

	</script>
</body>
</html>