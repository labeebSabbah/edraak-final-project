<?php 
$cart = $_SESSION['cart'] ?? array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An Online Store To Some New Clothes."/>
    <link rel="stylesheet" type="text/css" href="./css/app.css">
    <title>Labeeb's E-Commerce</title>
</head>
<body style="text-align: center;">
    <header>
        @include ('layouts.navigation')
    </header>
    <main>
        <h1 style="font-size: 100px">Labeeb's E-Commerce</h1>
        <form method="get" action="/search" style="margin-top: 2%">
            <h2 style="font-size: xx-large;">Got Something In Mind</h2><br>  
            <input type="text" name="search" class="w-1/2">
            <button type="submit">Search</button>
        </form>
        <h2 style="font-size: xx-large; margin-top: 50px;">Here's Some Of Our Products</h2>
        <div style="margin: 0 auto;">
        @include('components.productsView')
        </div>
    </main>
    @include ('components.copyRight')
    <script type="text/javascript" src="./js/app.js"></script>
</body>
</html>