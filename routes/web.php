<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\Adminstration;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'all'])->name('home');

Route::middleware('adminstration')->group(function () {

    Route::get('/admin', function () {
    return view('admin');
    })->name('admin'); 

    Route::get('/categories', [CategoriesController::class, 'show']);

    Route::get('/products', [ProductsController::class, 'show']);

    Route::get('/createCat', [CategoriesController::class, 'create']);

    Route::get('/createProd', function () {
        $mainCats = DB::select('SELECT * FROM categories WHERE is_main = true');
        $subCats = DB::select('SELECT * FROM categories WHERE is_main = false');
        return view('products.createProduct', ['mainCats' => $mainCats, 'subCats' => $subCats]);
    });

    Route::post('/createProd/add', [ProductsController::class, 'create']);

    Route::get('/deleteCat', [CategoriesController::class, 'delete']);

    Route::get('/deleteProd', [ProductsController::class, 'delete']);

    Route::get('/updateCat/{name}', function ($name) {
        return view('categories.updateCat' , ['name' => $name]);
    });

    Route::get('/updateCat', [CategoriesController::class, 'update']);

});
 
require __DIR__.'/auth.php';
