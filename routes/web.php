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


// Route::get('hello/{msg?}', function ($msg="no message"){
//     $html = <<<EOF
//     <h1>HELLO:{$msg}</h1>
//     EOF;
//     return $html;
// });

Route::get('hello', 'HelloController@index');