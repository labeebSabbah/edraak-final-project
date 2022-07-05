<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

session_start();

class OrdersController extends Controller
{
    public function placeOrder(Request $request) {
        $cart = $_SESSION['cart'];
        $name = Auth::user()->name;
        $numberOfItems = 0;
        $total = 0;

        $address1 = htmlspecialchars($request->address1);
        $address2 = htmlspecialchars($request->address2);
        $city = htmlspecialchars($request->city);
        $state = htmlspecialchars($request->state);
        $country = $request->country;
        $postal = $request->postal;
        $payment = $request->payment;

        $destination = array(
            $address1,
            $address2,
            $city,
            $state,
            $country,
            $postal,
            $payment
        );

        $destination = serialize($destination);

        foreach ($cart as $item) {
            $numberOfItems += 1 * $item['quantity'];
            $total += $item['quantity'] * floatval($item['price']);
        }

        $status = "Processing";

        DB::table('orders')->insert([
            'customerName' => $name,
            'created_at' => date("Y-m-d"),
            'numberOfItems' => $numberOfItems,
            'items' => serialize($cart),
            'total' => $total,
            'status' => $status,
            'destination' => $destination
        ]);

        $_SESSION['cart'] = [];

        return redirect()->route('cart', ['message' => 'Ordered Successfully']);
    }

    public function getOrders() {
        $name = Auth::user()->name;
        $admin = DB::table('users')->where('name', $name)->value('is_admin');
        if ($admin) {
            return view('orders.viewOrders', ['orders' => DB::table('orders')->simplePaginate(15)]);
        } else {
            return view('orders.myOrders', ['orders' => DB::table('orders')->where('customerName', '=', $name)->simplePaginate(15)]);
        }
    }

    public function updateStatus(Request $request) {
        $id = $request->id;
        $status = $request->status;
        if (DB::table('orders')->where('id', '=', $id)->update(['status' => $status])) {
            return redirect('/orders');
        }
    }
}
