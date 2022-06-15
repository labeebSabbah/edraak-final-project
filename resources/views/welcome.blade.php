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
    <h1>Hello World</h1>
    <a href="/cart">Show Cart</a> <br>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    <div style="margin: 0 auto;">
        @foreach ($mainCats as $item)
        <span>{{$item->name}} </span>
        @endforeach
    </div>
    <div style="margin: 0 auto;">
        @foreach ($products as $item)
        <span>{{$item->name}}<img src="{{asset('uploads/'.$item->image)}}">{{$item->price}}<a href="/addItem?id={{$item->id}}&name={{$item->name}}&price={{$item->price}}&image={{$item->image}}">Add To Cart</a></span> <br>
        @endforeach
        {{$products->links()}}
    </div>
</body>
</html>