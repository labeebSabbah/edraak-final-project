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
    <a href="/cart">Show Cart </a><?php echo count($cart);?><br>
    @if (Auth::check() == false)
    <a href="/login">Login</a>
    <a href="/register">Register</a>
    @else
    <h2>Hello {{auth()->user()->name}}</h2>
    <form method="POST" action="{{ route('logout') }}">
                @csrf
        <x-dropdown-link :href="route('logout')" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="dark" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
             </x-dropdown-link></form>
    @endif
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