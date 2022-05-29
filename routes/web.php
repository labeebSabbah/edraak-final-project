<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/nothing', function () {return view('nothing');});

Route::post('/create', [CategoriesController::class, 'create']);
 
require __DIR__.'/auth.php';
