<?php 
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
    <a href="/cart">Show Cart </a><?php echo count($cart);?><br>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    <form method="get" action="/search">
        <input type="text" name="search" value="{{$search}}">
        <button type="submit">Search</button>
    </form>
    <div style="margin: 0 auto;">
        @foreach ($mainCats as $item)
        <span>{{$item->name}} </span>
        @endforeach
    </div>
    @include('components.productsView')
</body>
</html>