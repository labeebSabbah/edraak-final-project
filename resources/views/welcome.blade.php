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
    <div>
        <section class="overflow-hidden text-gray-700 ">
  <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
    <div class="flex flex-wrap -m-1 md:-m-2">
        @foreach ($products as $product)
      <div class="flex flex-wrap w-1/3">
        <div class="w-full p-1 md:p-2">
          <img class="block object-cover object-center w-full rounded-lg"
            src="{{asset('uploads/'.$product->image)}}" style="height: 70%;" />
            <p>{{$product->name}}</p>
            <p>{{$product->price}}</p>
            <a href="/addItem?id={{$product->id}}&name={{$product->name}}&price={{$product->price}}&image={{$product->image}}"><button>Add To Cart</button></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{$products->links()}}
    </div>
</body>
</html>