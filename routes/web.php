<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HelloMiddleware;

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

// パラメーターを利用したルーティング
// ?あり変数だと任意パラメーターとなり、パラメーターがなくてもよくなる
// Route::get('hello/{msg?}', function ($msg="no message"){
//     $html = <<<EOF
//     <h1>HELLO:{$msg}</h1>
//     EOF;
//     return $html;
// });

// Route::get('hello', 'HelloController@index');
// Route::get('hello/other', 'HelloController@other');

// Route::get('hello', 'HelloController');

// Route::get('hello', function(){
//     return view("hello.index");
// });


// Route::get('hello/{id?}', 'HelloController@index');
// Route::get('hello', 'HelloController@index');
// Route::post('hello', 'HelloController@post');

// メソッドチェーンを使って、middlewareを追加(複数追加可能。->でつなげるだけ)
// Route::get('hello', 'HelloController@index')->middleware(HelloMiddleware::class);

// グループ化したミドルウェアを設定。
Route::get('hello', 'HelloController@index')->middleware('hello');
