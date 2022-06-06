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
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move('uploads', $filename);
        }
        DB::table('products')->insert([
            'name' => $name,
            'description' => $desc,
            'price' => $price,
            'size' => $size,
            'return_policy' => $return,
            'image' => $filename
        ]);
        return redirect('/products');
    }

    public function delete(Request $request) {
        $name = $request->name;
        DB::table('products')->where('name', '=', $name)->delete();
        return redirect('/products');
    }

}
