<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labeeb's E-Commerce</title>
</head>
<body>
    <h1>Hello World</h1>
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    <div style="margin: auto;">
        @foreach ($mainCats as $item)
        <span>{{$item->name}} </span>
        @endforeach
    </div>
    <div style="margin: auto;">
        @foreach ($products as $item)
        <span>{{$item->name}} </span>
        @endforeach
        {{$products->links()}}
    </div>
</body>
</html>