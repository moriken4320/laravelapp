<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ['name'=>'taro', 'mail'=>'taro@yamada'],
            ['name'=>'hanako', 'mail'=>'hanako@flower'],
            ['name'=>'sachiko', 'mail'=>'sachiko@happy'],
        ];
        //コントローラーに渡す前にリクエストに$dataをマージする
        $request->merge(['data'=>$data]);

        $response =  $next($request);

        // $content内の$patternを$replaceに置換する
        $content = $response->content();
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>'; //$1は正規表現の()の値に該当する。1ということは正規表現の1番目の()のことを表す。
        $content = preg_replace($pattern, $replace, $content);
        $response->setContent($content);
        return $response;
    }
}
