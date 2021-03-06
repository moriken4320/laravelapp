<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest; //追加
use Illuminate\Support\Facades\Validator; //追加(validatorインスタンスを作成するため)

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // 「msg」というキーのクッキーが保存されているかどうかをチェック
        if($request->hasCookie('msg')){
            $msg = 'Cookie: ' . $request->cookie('msg');
        }else{
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=>$msg]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index',
            ['msg'=>'「' . $msg . '」をクッキーに保存しました。']
        );
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}
