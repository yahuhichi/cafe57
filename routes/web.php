<!-- ルーティング -->
<?php 

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

// 竹内さんのGitHubブランチからコピー(持ち出し申請画面のルーティングは記述されていなかったので自分が追記した。) ////////////

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products'); // 在庫一覧画面を表示
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create'); // 商品登録画面を表示
Route::get('/out', [App\Http\Controllers\ProductController::class, 'create'])->name('out'); // 持ち出し申請画面を表示(※ここは自分が追記した)
Route::get('/order/{id}', [App\Http\Controllers\ProductController::class, 'order'])->name('order'); // 注文表画面を表示
Route::get('/form', [App\Http\Controllers\ProductController::class, 'form'])->name('form'); // 注文メール送信画面を表示
Route::post('/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products');
Route::get('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::post('/subtract', [App\Http\Controllers\ProductController::class, 'subtract'])->name('products');
Route::post('/insert', [App\Http\Controllers\ProductController::class, 'insert'])->name('order_table');
Route::get('/order_table', [App\Http\Controllers\ProductController::class, 'order_table'])->name('order_table');
Route::post('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('order_table');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form'); // 新規登録画面を表示
Route::post('/signup', 'UsersController@signup')->name('signup'); // 新規登録の処理

Route::get('/login_form', 'UsersController@login_form')->name('login_form'); // ログイン画面を表示
Route::post('/login', 'UsersController@login')->name('login'); // ログインの処理

Route::get('/home_screen', 'UsersController@home_screen')->name('home_screen'); // ホーム画面を表示
Route::post('/home', 'UsersController@login')->name('home'); // ホーム画面の処理
