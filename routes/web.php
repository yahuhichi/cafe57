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

//新規登録画面の表示
Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form');
Route::post('/signup', 'UsersController@signup')->name('signup'); // 新規登録の処理

//ログイン画面へ遷移
Route::get('/login_form', 'UsersController@login_form')->name('login_form');
Route::post('/login', 'UsersController@login')->name('login'); // ログイン認証
Route::post('/logout', 'UsersController@logout')->name('logout'); // ログアウト

//ホーム画面へ遷移
Route::get('/home_screen', 'ChatController@home_screen')->name('home_screen');

//チャット登録
Route::post('/chat', 'ChatController@chat')->name('chat');
Route::get('/chat_delete/{id}', 'ChatController@chat_delete')->name('chat_delete'); //チャット削除

//ログインしないとアクセス出来ないようにする
Route::middleware('auth:api', 'throttle:60,1')->group(function () {

//在庫一覧画面の表示
Route::get('/products', 'ProductController@index')->name('products');
Route::post('/products_process', 'UsersController@home')->name('products_process'); // 在庫一覧画面の処理

//新規備品登録画面へ遷移
Route::get('/create', 'ProductController@create')->name('create');

//注文申請画面へ遷移
Route::get('/order/{id}', 'ProductController@order')->name('order');

//注文メール送信画面へ遷移
Route::get('/form2', 'ProductController@form')->name('form');
//注文番号確認画面へ遷移
Route::get('/ship', 'ProductController@ship')->name('ship');

//持ち出し申請submit
Route::post('/update', 'ProductController@update')->name('products');

//持ち出し申請画面へ遷移
Route::get('/store', 'ProductController@store')->name('store');

//備品登録submit
Route::post('/subtract', 'ProductController@subtract')->name('products');

//orderテーブルへのデータ受け渡し
Route::post('/insert', 'ProductController@insert')->name('order_table');

//注文表画面表示
Route::get('/order_table', 'ProductController@order_table')->name('order_table');

Route::get('/home_screen', 'UsersController@home_screen')->name('home_screen'); // ホーム画面のviewを表示(get)
Route::post('/home', 'UsersController@login')->name('home'); // ホーム画面の処理(post)


Route::post('/delete/{id}', 'ProductController@delete')->name('order_table');
// 送信メール本文のプレビュー
Route::get('sample/mailable/preview', function () {
    return new App\Mail\SampleNotification();
  });
//SampleNotificationメソッド
  Route::get('sample/mailable/send', 'SampleController@SampleNotification');
  //Mailableを使った
 /*  Route::get('/mail', 'MailController@index'); */
  Route::post('/send', 'MailController@send');

//シフト申請画面
Route::get('/work', 'WorkController@work')->name('work_form');


// 勤怠一覧画面
Route::get('/shift', 'WorkController@shift')->name('shift_form');


//Mailableを使った
Route::get('/form', 'MailController@form');
Route::post('/form', 'MailController@send');



});

/* Route::middleware(['AdminMiddleware'])->group(function(){
    //アドミン以外見られたくないルート設定
}); */

/* Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); */
