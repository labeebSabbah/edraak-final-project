<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function create(Request $request) {
        DB::table('categories')->insert(['name' => $request->input('name'), 'is_main' => $request->input('main')]);
        return redirect()->route('home');
    }

    public function delete(Request $request) {
        DB::table('categories')->where('name', '=', $request->input('cat'));
        return redirect()->route('home');
    }
}
