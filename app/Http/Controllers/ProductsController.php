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
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        $desc = $request->input('desc');
        $desc = htmlspecialchars($desc);
        $price = $request->input('price');
        $price = htmlspecialchars($price);
        $size = $request->input('size');
        $return = $request->input('return');
        $return = htmlspecialchars($return);
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads',$filename);
        DB::table('products')->insert([
            'name' => $name,
            'desc' => $desc,
            'price' => $price,
            'size' => $size,
            'return_policy' => $return,
            'image' => $file
        ]);
        return redirect('/products');
    }

    public function delete(Request $request) {

    }

}
