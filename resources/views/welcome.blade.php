<?php 
use Illuminate\Support\Facades\Auth;

$cart = $_SESSION['cart'] ?? array();
if (!isset($search)) {
    $search = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/app.css">
    <title>Labeeb's E-Commerce</title>
</head>
<body>
    @include ('layouts.navigation')
    <form method="get" action="/search">
        <input type="text" name="search" value="{{$search}}">
        <button type="submit">Search</button>
    </form>
    <div style="margin: 0 auto;">
    @include('components.productsView')
    <script type="text/javascript" src="./js/app.js"></script>
</body>
</html>