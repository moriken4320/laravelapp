<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest; //追加
use Illuminate\Support\Facades\Validator; //追加(validatorインスタンスを作成するため)

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


    // public function index(Request $request)
    // {
    //     // クエリー文字列でバリデーションする場合、query()メソッドを使う
    //     $validator = Validator::make($request->query(), [
    //         'id'=>'required',
    //         'pass'=>'required',
    //     ]);
    //     if($validator->fails()){
    //         $msg = 'クエリーに問題があります。';
    //     }else{
    //         $msg = 'ID/PASSをうけつけました。フォームを入力ください。';
    //     }

    //     return view('hello.index', ['msg'=>$msg, ]);
    // }

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

    // public function post(HelloRequest $request)
    // {
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    // public function post(Request $request)
    // {
    //     $rules = [
    //         'name'=>'required',
    //         'mail'=>'email',
    //         'age'=>'numeric',
    //     ];
    //     $messages = [
    //         'name.required' => '名前は必ず入力してください。',
    //         'mail.email' => 'メールアドレスが必要です。',
    //         'age.numeric' => '年齢を整数で記入ください。',
    //         'age.min' => '年齢は0以上で入力ください。',
    //         'age.max' => '年齢は150以下で入力ください。',
    //     ];

    //     // バリデータを作成
    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     // フォームに入力された年齢が整数であったら、「0以上であるか」のルールを追加する。
    //     $validator->sometimes('age', 'min:0', function($input){
    //         return !is_int($input->age);
    //     });

    //     // フォームに入力された年齢が整数であったら、「150以下であるか」のルールを追加する。
    //     $validator->sometimes('age', 'max:150', function($input){
    //         return !is_int($input->age);
    //     });

    //     // バリデーションに引っ掛かったら/helloにリダイレクトする(fails=失敗したら、passes=成功したら)
    //     if($validator->fails()){
    //         return redirect('/hello')
    //             ->withErrors($validator) //エラーメッセージを渡す
    //             ->withInput(); //フォーム内容を渡す
    //     }
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    public function index(Request $request)
    {
        return view('hello.index', ['msg'=>'フォームを入力してください。']);
    }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg'=>'正しく入力されました。']);
    }
}
