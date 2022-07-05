<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductsController extends Controller
{

    public function show() {
        return view('products.showProducts', ['products' => DB::table('products')->where('is_deleted', '=' , false)->paginate(15)]);
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
            $filename= $file->getClientOriginalName();
            $file->move('uploads', $filename);
        } else {
            $filename = "No Image";
        }
        $mainCat = $request->input('mainCat');
        $subCats = serialize($request->input('subCats'));
        DB::table('products')->insert([
            'name' => $name,
            'description' => $desc,
            'price' => $price,
            'size' => $size,
            'return_policy' => $return,
            'image' => $filename,
            'main_category' => $mainCat,
            'sub_categories' => $subCats 
        ]);
        return redirect('/products');
    }

    public function delete(Request $request) {
        $id = $request->id;
        $ordered = 0;
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            foreach (unserialize($order->items) as $item) {
                if ($item['id'] == $id) {
                    $ordered = 1;
                    break;
                }
            }
            if ($ordered) {
                break;
            }
        }
        if ($ordered) {
            DB::table('products')->where('id' , '=', $id)->update(['is_deleted'=>true]);
        } else {
            DB::table('products')->where('id', '=', $id)->delete();
        }
        return redirect('/products');
    }

    public function update(Request $request) {
        $id = $request->id;
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
        } else {    
            $filename = "No Image";
        }
        $mainCat = $request->input('mainCat');
        $subCats = serialize($request->input('subCats'));
        DB::table('products')->where('id', $id)->update([
            'name' => $name,
            'description' => $desc,
            'price' => $price,
            'size' => $size,
            'return_policy' => $return,
            'image' => $filename,
            'main_category' => $mainCat,
            'sub_categories' => $subCats 
        ]);
        return redirect('/products');
    }

}
