<?php 
use Symfony\Component\Intl\Countries;

$countries = Countries::getNames();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
</head>
<body>
	<form method="POST" action="/checkout/placeOrder">
		@csrf
		<div>
			<label for="address1">Address Line 1</label>
			<input type="text" name="address1" required>
		</div>
		<div class="mt-4">
			<label for="address2">Address Line 2</label>
			<input type="text" name="address2">
		</div>
		<div class="mt-4">
			<label for="city">City</label>
			<input type="text" name="city" required>
		</div>
		<div class="mt-4">
			<label for="state">State</label>
			<input type="text" name="state">
		</div>
		<div class="mt-4">
			<label for="country">Country</label>
			<select name="country">
				@foreach ($countries as $country)
				@if ($country != "Israel")
				<option value="{{$country}}">{{$country}}</option>
				@endif
				@endforeach
			</select>
		</div>
		<div class="mt-4">
			<label for="postal">Postal Code</label>
			<input type="number" name="postal" min="0" required>
		</div>
		<div class="mt-4">
			<label for="payment">Select Payment Method</label><br>
			<span>Cash On Delivery</span><input type="radio" name="payment" checked>
		</div>
		<div class="mt-4">
			<button type="submit">Confirm</button>
		</div>
	</form>
</body>
</html>