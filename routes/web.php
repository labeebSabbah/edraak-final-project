<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrdersController;
use App\Http\Middleware\Adminstration;
use App\Http\Middleware\Owner;

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

Route::get('/search', [MainController::class, 'search']);

Route::get('/dashboard', [MainController::class, 'redirectHome'])->middleware('auth', 'verified')->name('dashboard');

Route::get('/details', [MainController::class, 'details']);

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/addItem', [MainController::class, 'addItem']);

    Route::get('/removeItem', [MainController::class, 'removeItem']);
    
    Route::get('/cart', function() {
        return view('cart');
    })->name('cart');
    
    Route::get('/checkout', function () {
        return view('checkout');
    });
    
    Route::post('/checkout/placeOrder', [OrdersController::class, 'placeOrder']);
    
    Route::get('/myOrders', [OrdersController::class, 'getOrders']);
    
    Route::get('/myOrders/{id}', function ($id) {
        return view('orders.orderDetails', ['order' => DB::table('orders')->where('id', '=', $id)->first(), 'admin' => false]);
    });
});

Route::middleware('adminstration', 'auth')->group(function () { 

    Route::get('/categories', [CategoriesController::class, 'show']);

    Route::get('/products', [ProductsController::class, 'show']);

    Route::get('/createSub', function () {
        return view('categories.createSubCat');
    });

    Route::get('/createSub/add', [CategoriesController::class, 'addSub']);

    Route::get('/createMain', function () {
        return view('categories.createMainCat');
    });

    Route::get('/createMain/add', [CategoriesController::class, 'addMain']);

    Route::get('/createProd', function () {
        $mainCats = DB::select('SELECT * FROM main_categories');
        $subCats = DB::select('SELECT * FROM sub_categories');
        return view('products.createProduct', ['mainCats' => $mainCats, 'subCats' => $subCats]);
    });

    Route::post('/createProd/add', [ProductsController::class, 'create']);

    Route::get('/deleteCat', [CategoriesController::class, 'delete']);

    Route::get('/deleteProd', [ProductsController::class, 'delete']);

    Route::get('/updateCat/{name}', function ($name) {
        return view('categories.updateCat' , ['name' => $name]);
    });

    Route::get('/updateCat', [CategoriesController::class, 'update']);

    Route::get('/updateProd/{id}', function($id) {
        $product = DB::table('products')->where('id', $id)->get();
        $mainCats = DB::select('SELECT * FROM main_categories');
        $subCats = DB::select('SELECT * FROM sub_categories');
        return view('products.createProduct', ['product' => $product, 'mainCats' => $mainCats, 'subCats' => $subCats]);
    });

    Route::post('/updateProd', [ProductsController::class, 'update']);

    Route::get('/orders', [OrdersController::class, 'getOrders']);

    Route::get('/orders/{id}', function ($id) {
        return view('orders.orderDetails', ['order' => DB::table('orders')->where('id', '=', $id)->first(), 'admin' => true]); 
    });

    Route::get('/updateStatus', [OrdersController::class, 'updateStatus']);

});
 
require __DIR__.'/auth.php';
