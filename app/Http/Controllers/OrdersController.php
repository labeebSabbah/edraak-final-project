<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'created_at' => date("Y-m-d"),
            'numberOfItems' => $numberOfItems,
            'items' => serialize($cart),
            'total' => $total,
            'status' => $status
        ]);

        $_SESSION['cart'] = [];

        return redirect()->route('cart', ['message' => 'Ordered Successfully']);
    }

    public function getOrders() {
        $name = Auth::user()->name;
        $admin = DB::table('users')->where('name', $name)->value('is_admin');
        if ($admin) {
            return view('orders.viewOrders', ['orders' => DB::table('orders')->paginate(15)]);
        } else {
            return view('orders.myOrders', ['orders' => DB::table('orders')->where('customerName', '=', $name)->paginate(15)]);
        }
    }
}
