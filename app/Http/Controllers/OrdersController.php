<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;

session_start();

class OrdersController extends Controller
{
    public function placeOrder() {
        $cart = $_SESSION['cart'];
        $name = Auth::user()->name;
        $numberOfItems = 0;
        $total = 0;

        foreach ($cart as $item) {
            $numberOfItems += 1 * $item['quantity'];
            $total = $item['quantity'] * floatval($item['price']);
        }

        $status = "processing";

        DB::table('orders')->insert([
            'customerName' => $name,
            'numberOfItems' => $numberOfItems,
            'items' => serialize($cart),
            'total' => $total,
            'status' => $status
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
