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
        return redirect()->route('categories');
    }

    public function delete(Request $request) {
        $name = $request->input('cat');
        $name = htmlspecialchars($name);
        DB::table('categories')->where('name', '=', $name)->delete();
        return redirect()->route('categories');
    }

    public function update(Request $request) {
        $new_name = $require->input('new_name');
        $new_name = htmlspecialchars($name);
        DB::update("UPDATE categories SET name = {$new_name} WHERE name = {$request->input('name')}");
        return redirect()->route('categories');
    }
}
