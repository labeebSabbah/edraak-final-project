<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
</head>
<body>
	<?php 
		$cart = $_SESSION['cart'] ?? array();
		if (count($cart) == 0) {
			echo "Your Cart Is Empty";
			echo "<a href='/'><button>Add Products</button></a>";
		 } else {
			var_dump($cart);
		}
	?>
</body>
</html>