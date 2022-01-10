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

Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form'); // 新規登録画面のviewを表示(get)
Route::post('/signup', 'UsersController@signup')->name('signup'); // 新規登録の処理(post)

Route::get('/login_form', 'UsersController@login_form')->name('login_form'); // ログイン画面のviewを表示(get)
Route::post('/login', 'UsersController@login')->name('login'); // ログインの処理(post)

Route::get('/home_screen', 'UsersController@home_screen')->name('home_screen'); // ホーム画面のviewを表示(get)
Route::post('/home', 'UsersController@login')->name('home'); // ホーム画面の処理(post)

Route::post('/test', 'TestController@index')->name('test'); // テストコメント