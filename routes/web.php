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

// viewを表示する際はget,その他はpost

Route::get('/', function () { // Laravel簡易サーバーを開いた時に最初に表示される画面を表示
    return view('welcome');   // welcome.blade.phpを表示する。
});
Route::get('/index', 'UsersController@index')->name('index');

Route::get('/signup_form', 'UsersController@signup_form')->name('signup_form'); // 新規登録画面のviewを表示
Route::post('/signup', 'UsersController@signup')->name('signup'); 

Route::get('/login_form', 'UsersController@login_form')->name('login_form'); // ログイン画面のviewを表示
Route::post('/login', 'UsersController@signup')->name('login'); 
