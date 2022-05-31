<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoriesController;

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
    return view('admin');
    if(Auth::check()) {
    $name = auth()->user()->name;
    if (DB::table('users')->where('name', $name)->value('is_admin')) {
        return view('admin');
    }
    }
    return view('welcome');
})->name('home');

Route::get('/nothing', function () {return view('nothing');});

Route::get('/createCat', [CategoriesController::class, 'create']);

Route::get('/deleteCat', [CategoriesController::class, 'delete']);

Route::get('/createProd', [ProductsController::class, 'create']);

Route::get('/deleteProd', [ProductsController::class, 'delete']);
 
require __DIR__.'/auth.php';
