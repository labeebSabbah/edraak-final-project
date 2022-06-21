<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{

    public function show() {
        $mainCat = DB::select('SELECT * FROM main_categories');
        $subCat = DB::select('SELECT * FROM sub_categories');
        return view('categories.showCategories', ['mainCat' => $mainCat, 'subCat' => $subCat]);
    }

    public function addMain(Request $request) {
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        DB::table('main_categories')->insert(['name' => $name]);
        return redirect('/categories');
    }

    public function addSub(Request $request) {
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        DB::table('sub_categories')->insert(['name' => $name, 'main_id' => $request->id]);
        return redirect('/categories');
    }

    public function delete(Request $request) {
        $name = $request->input('name');
        $name = htmlspecialchars($name);
        if (DB::table('sub_categories')->where('name', '=', $name)->delete()) {
            
        } else {
            DB::table('main_categories')->where('id', '=', $name)->delete();
            DB::table('sub_categories')->where('main_id', '=', $name)->delete();
        }
        
        
        return redirect('/categories');
    }

    public function update(Request $request) {
        $new_name = $request->input('new_name');
        $name = $request->input('name');
        $new_name = htmlspecialchars($new_name);
        DB::table('main_categories')->where('name', '=', $name)->update(['name' => $new_name]);
        DB::table('sub_categories')->where('name', '=', $name)->update(['name' => $new_name]);
        return redirect('/categories');
    }

}
