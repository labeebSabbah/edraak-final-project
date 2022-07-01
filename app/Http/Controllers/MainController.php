<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();

class MainController extends Controller
{

    public function all() {
        return view('welcome', [
            'products' => DB::table('products')->where('is_deleted', '=', false)->paginate(15),
            'mainCats' => DB::select('SELECT * FROM main_categories')
        ]);
    }

    public function addItem(Request $request) {
        $cart = $_SESSION['cart'] ?? array();
        $in_cart = 0;
        if (count($cart) == 0) {} else {
            for ($i=0; $i < count($cart); $i++) { 
                if ($request->id == $cart[$i]['id']) {
                    $cart[$i]['quantity'] += 1;
                    $in_cart = 1;
                    break;
                }
        }
        }
        if (!$in_cart) {
            $cart[] = ['id'=>$request->id,'name'=>$request->name,'price'=>$request->price,'image'=>$request->image,'quantity'=>1];
        }
        $_SESSION['cart'] = $cart;
        return redirect('/');
    }

    public function removeItem(Request $request) {
        $cart = $_SESSION['cart'] ?? array();
        for ($i=0; $i < count($cart); $i++) { 
            if ($request->id == $cart[$i]['id']) {
                $cart[$i]['quantity'] -= 1;
                if ($cart[$i]['quantity'] == 0) {
                    unset($cart[$i]);
                }
                break;
            }
        }
        $_SESSION['cart'] = $cart;
        return redirect('/cart');
    }

    public function search(Request $request) {
        $search_name = $request->input('search');
        $search_name = htmlspecialchars($search_name);
        $items = DB::table('products')->where('name', 'like', '%' . $search_name . '%')->paginate(15);
        return view('search', ['products' => $items, 'search' => $search_name]);
    }

}
