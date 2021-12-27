<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');

Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('/order/{id}', [App\Http\Controllers\ProductController::class, 'order'])->name('order');
Route::get('/form', [App\Http\Controllers\ProductController::class, 'form'])->name('form');
Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products');
Route::get('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::post('/subtract', [App\Http\Controllers\ProductController::class, 'subtract'])->name('products');
Route::post('/insert', [App\Http\Controllers\ProductController::class, 'insert'])->name('order_table');
Route::get('/order_table', [App\Http\Controllers\ProductController::class, 'order_table'])->name('order_table');

Route::post('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('order_table');
