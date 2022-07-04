<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="./css/app.css">
</head>
<body style="text-align: center;" bgcolor="#1363DF">
	@include ('layouts.navigation')
	<form method="POST" action="/checkout/placeOrder" style="width: 30%; margin: auto; background: #47B5FF;">
		@csrf
		<div>
			<label for="address1">Address Line 1</label><br>
			<input type="text" name="address1" required>
		</div>
		<div class="mt-4">
			<label for="address2">Address Line 2</label><br>
			<input type="text" name="address2">
		</div>
		<div class="mt-4">
			<label for="city">City</label><br>
			<input type="text" name="city" required>
		</div>
		<div class="mt-4">
			<label for="state">State</label><br>
			<input type="text" name="state">
		</div>
		<div class="mt-4">
			<label for="country">Country</label><br>
			@include ('components.countryInput')
		</div>
		<div class="mt-4">
			<label for="postal">Postal Code</label><br>
			<input type="number" name="postal" min="0" required>
		</div>
		<div class="mt-4">
			<label for="payment">Select Payment Method</label><br>
			<span>Cash On Delivery</span><input type="radio" name="payment" checked>
		</div>
		<div class="mt-4">
			<button type="submit" style="border: 2px solid #06283D; background: #06283D; color: white;">Confirm</button>
		</div>
	</form>
</body>
</html>