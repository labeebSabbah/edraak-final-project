<?php 
use Illuminate\Support\Facades\DB;
$products = DB::select('SELECT * from products');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
</head>
<body>

</body>
</html>