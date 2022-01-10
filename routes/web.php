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
//在庫一覧表表示
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
//新規登録画面へ遷移
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
//注文申請画面へ遷移
Route::get('/order/{id}', [App\Http\Controllers\ProductController::class, 'order'])->name('order');
//注文メール送信画面へ遷移
/* Route::get('/form', [App\Http\Controllers\ProductController::class, 'form'])->name('form'); */
//注文メール送信画面へ遷移(mailable機能)
Route::get('/mail', [App\Http\Controllers\ProductController::class, 'mail'])->name('mail');
//持ち出し申請submit
Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products');
//持ち出し申請画面へ遷移
Route::get('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
//備品登録submit
Route::post('/subtract', [App\Http\Controllers\ProductController::class, 'subtract'])->name('products');
//orderテーブルへのデータ受け渡し
Route::post('/insert', [App\Http\Controllers\ProductController::class, 'insert'])->name('order_table');
//注文表画面表示
Route::get('/order_table', [App\Http\Controllers\ProductController::class, 'order_table'])->name('order_table');

Route::post('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('order_table');
// 送信メール本文のプレビュー
Route::get('sample/mailable/preview', function () {
    return new App\Mail\SampleNotification();
  });
//SampleNotificationメソッド
  Route::get('sample/mailable/send', 'SampleController@SampleNotification');
  //Mailableを使った
 /*  Route::get('/mail', 'MailController@index'); */
  Route::post('/send', 'MailController@send');
