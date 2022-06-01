<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('adminstration')->group(function () {

    if (Auth::check()) {

    Route::get('/admin', function () {
    return view('admin');
    })->name('admin'); 

    Route::get('/categories', function () { 
        return view('categories.showCategories');
    });

    Route::get('/createCat', function () {
        return view('categories.createCat');
    });

    Route::get('/createCat/add', [CategoriesController::class, 'create']);

    Route::get('/deleteCat', [CategoriesController::class, 'delete']);

    Route::get('/updateCat', function () {
        return view('categories.updateCat');
    });

    } else {
        return redirect('/');
    }

});

// Route::get('/createProd', [ProductsController::class, 'create']);

// Route::get('/deleteProd', [ProductsController::class, 'delete']);
 
require __DIR__.'/auth.php';
