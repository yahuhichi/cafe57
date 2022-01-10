<!-- ルーティング -->
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

Route::get('/', function () { // Laravel簡易サーバーを開いた時に最初に表示される画面を表示
    return view('welcome');   // welcome.blade.phpを表示する。
});

Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form'); // 新規登録画面を表示
Route::post('/signup', 'UsersController@signup')->name('signup'); // 新規登録の処理

Route::get('/login_form', 'UsersController@login_form')->name('login_form'); // ログイン画面を表示
Route::post('/login', 'UsersController@login')->name('login'); // ログインの処理

Route::get('/home_screen', 'UsersController@home_screen')->name('home_screen'); // ホーム画面のviewを表示(get)
Route::post('/home', 'UsersController@login')->name('home'); // ホーム画面の処理(post)

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* 2022/1/10(月) masterブランチに竹内さんがmergeしたルーティング
※Laravel8の書き方になっているので、Laravel6の書き方に直すようSlackで依頼した。*/

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