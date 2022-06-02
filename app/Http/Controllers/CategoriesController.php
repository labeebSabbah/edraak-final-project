<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{

    public function create(Request $request) {
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        DB::table('categories')->insert(['name' => $name, 'is_main' => $request->input('main')]);
        return redirect('/categories');
    }

    public function delete(Request $request) {
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        DB::table('categories')->where('name', '=', $name)->delete();
        return redirect('/categories');
    }

    public function update(Request $request) {
        $new_name = $request->input('new_name');
        $name = $request->input('name');
        $new_name = htmlspecialchars($new_name);
        DB::table('categories')->where('name', '=', $name)->update(['name' => $new_name]);
        return redirect('/categories');
    }
}
