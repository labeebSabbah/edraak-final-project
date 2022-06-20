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

Route::get('/addItem', [MainController::class, 'addItem']);

Route::get('/removeItem', [MainController::class, 'removeItem']);

Route::get('/cart', function() {
    return view('cart');
});

Route::middleware('adminstration')->group(function () {

    Route::get('/admin', function () {
    return view('admin');
    })->name('admin'); 

    Route::get('/categories', [CategoriesController::class, 'show']);

    Route::get('/products', [ProductsController::class, 'show']);

    Route::get('/createSub', function () {
        return view('categories.createSubCat');
    });

    Route::get('/createSub/add', [CategoriesController::class, 'addSub']);

    Route::get('/createMain/add', [CategoriesController::class, 'addMain']);

    Route::get('/createProd', function () {
        $mainCats = DB::select('SELECT * FROM main_categories');
        $subCats = DB::select('SELECT * FROM sub_categories');
        return view('products.createProduct', ['mainCats' => $mainCats, 'subCats' => $subCats]);
    });

    Route::post('/createProd/add', [ProductsController::class, 'create']);

    Route::get('/deleteMain', [CategoriesController::class, 'deleteMain']);

    Route::get('/deleteSub', [CategoriesController::class, 'deleteSub']);

    Route::get('/deleteProd', [ProductsController::class, 'delete']);

    Route::get('/updateCat/{name}', function ($name) {
        return view('categories.updateCat' , ['name' => $name]);
    });

    Route::get('/updateCat', [CategoriesController::class, 'update']);

});
 
require __DIR__.'/auth.php';
