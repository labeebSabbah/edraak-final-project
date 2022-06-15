<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function all() {
        return view('welcome', [
            'products' => DB::table('products')->paginate(2),
            'mainCats' => DB::select('SELECT * FROM categories WHERE is_main = true')
        ]);
    }

    public function addItem(Request $request) {
        $cart = $_SESSION['cart'] ?? array();
        $cart[] = [$request->id,$request->name,$request->price,$request->image];
        $_SESSION['cart'] = $cart;
        return redirect('/');
    }

}
