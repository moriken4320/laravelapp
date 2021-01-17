<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest; //追加

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16pt; color:#999;}
h1{font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt)
{
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    // public function index(Request $request, Response $response){
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title','Hello/Index') . $style .
    //         $body
    //         . tag('h1','Hello')
    //         . tag('h3','Request') . tag('pre',"{$request}")
    //         . tag('h3','Response') . tag('pre',"{$response}")
    //         . $end;
    //     $response->setContent($html);
    //     return $response;
    // }

    // public function other(){
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title','Hello/Other') . $style .
    //         $body
    //         . tag('h1','Other') . tag('p','this is Other page')
    //         . $end;
    //     return $html;
    // }

    // public function __invoke()
    // {
    //     global $head, $style, $body, $end;

    //     return
    //     $head . tag('title','Hello/Single') . $style .
    //     $body
    //     . tag('h1','Single') . tag('p','this is Single page')
    //     . $end;
    // }

    // public function index($id="zero"){
    //     $data = ['msg'=>'これはコントローラーから渡されたメッセージです。', 'id'=>$id];
    //     return view("hello.index", $data);
    // }

    // public function index(Request $request){
    //     $data = ['msg'=>'これはコントローラーから渡されたメッセージです。', 'id'=>$request->id];
    //     return view("hello.index", $data);
    // }

    // public function index()
    // {
    //     $data = [
    //         ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
    //         ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
    //         ['name'=>'鈴木幸子', 'mail'=>'sachico@happy']
    //     ];
    //     return view("hello.index", ['data' => $data]);
    // }

    // public function post(Request $request)
    // {
    //     return view("hello.index", ['msg' => $request->msg]);
    // }

    // middlewareによってリクエストに含まれた$dataをheool.indexビューに渡す。
    // public function index(Request $request){
    //     return view('hello.index', ['data'=>$request->data]);
    // }


    public function index(Request $request)
    {
        return view('hello.index', ['msg'=>'フォームを入力：']);
    }

    // public function post(Request $request)
    // {
    //     $validate_rule = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',//複数のルールを適用する場合「|」でつなげる
    //     ];
    //     $this->validate($request, $validate_rule);
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }
}
