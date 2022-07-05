<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<title>@if (!isset($product)) Add A New Product @else Update A Product @endif</title>
</head>
<body style="color: white" bgcolor="#1363DF">
	<form method="post" <?php if (isset($product)) {echo 'action="/updateProd"';} else {echo 'action="/createProd/add"';} ?> id="addForm" enctype="multipart/form-data" class="container m-auto w-6/12" style="background-color: #47B5FF;">
		@csrf
		<div>
			<label for="name">Enter Name</label><br>
			<input style="color: black;" class="w-full" type="text" name="name" required <?php if (isset($product)) {echo "value='{$product[0]->name}'";} ?>>
		</div>

		<div class="mt-4">
			<label for="desc">Enter Description</label><br>
			<input style="color: black;" class="w-full" type="text" name="desc" required <?php if (isset($product)) {echo "value='{$product[0]->description}'";} ?>>
		</div>
		
		<div class="mt-4">
			<label for="price">Enter Price</label><br>
			<input style="color: black;" class="w-full" type="number" name="price" id="prodPrice" step="0.01" required <?php if (isset($product)) {echo "value='{$product[0]->price}'";} ?>>
		</div>

		<div class="mt-4">
			<label for="size">Select Size</label><br>
			<select style="color: black;" class="w-full" name="size">
				<option value="">Size</option>
				<option value="S">S</option>
				<option value="M">M</option>
				<option value="L">L</option>
				<option value="XL">XL</option>
				<option value="XXL">XXL</option>
			</select>
		</div>

		<div class="mt-4">
			<label for="return">Enter Return Policy (optional)</label><br>
			<input style="color: black;" class="w-full" type="text" name="return" <?php if (isset($product)) {echo "value='{$product[0]->return_policy}'";} ?>>
		</div>

		<div class="mt-4"> 
			<label for="image">Image</label><br>
			<input style="color: white;" class="w-full" type="file" name="image"> <?php if (isset($product)) {echo "Last Selected:- {$product[0]->image}";} ?>
		</div>

		<div class="mt-4">
			@foreach ($mainCats as $item)
			<label for="mainCat">{{$item->name}}</label>
			<input type="radio" name="mainCat" value="{{$item->id}}" <?php if (isset($product)) {if ($product[0]->main_category == $item->id) {echo "checked";}} ?>>
			@endforeach
		</div>

		<div class="mt-4">
			<?php $printed = 0; ?>
			@for ($i = 0; $i < count($subCats); $i++)
			@for ($j = $subCats[$i]; $j >= 0; $j--)
			if ($subCats[$i]->name == $subCats[$j])
			<?php $printed = 1; break; ?>
			@endif
			@endfor
			@if (!$printed)
			<label for="subCats[]">{{$item->name}}</label>
			<input type="checkbox" name="subCats[]" value="{{$item->name}}" <?php 
				if (isset($product)) {
					$catArr = unserialize($product[0]->sub_categories);
					if (!is_null($catArr)) {
						foreach ($catArr as $value) {
							if ($value == $item->name) {
								echo "checked";
							}
						}
					}
				}
		?>>
			@endif
			@endfor
		</div>
		<div class="mt-4">
			<button type="submit" name="id" class="w-full bg-green-500 py-3" <?php if (isset($product)) {echo "value='{$product[0]->id}'";} ?> >@if (!isset($product)) Add Product @else Update Product @endif</button><br>
			<button class="w-full bg-red-600 py-3" onclick="history.back()">Cancel</button>
		</div>
	</form>

	<script type="text/javascript">
		
		const prodPrice = document.getElementById('prodPrice');
		const addForm = document.getElementById('addForm');

		addForm.addEventListener('submit', function (e) {
			let error = '';
			if (prodPrice.value <= 0) {
				error += "Invalid Price";
			}
			if (error) {
				e.preventDefault();
				alert(error);
			} else {
				@if (isset($product)) 
				alert("Product Updated Successfully");
				@else
				alert("Product Added Successfully");
				@endif
			}
		});

	</script>
</body>
</html>