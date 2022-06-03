<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductsController extends Controller
{

    public function show() {
        return view('products.showProducts', ['products' => DB::table('products')->paginate(2)]);
    }

    public function create(Request $request) {

    }

    public function delete(Request $request) {

    }

}
