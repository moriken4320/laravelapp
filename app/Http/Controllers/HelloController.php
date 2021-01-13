<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    public function index(Request $request, Response $response){
        global $head, $style, $body, $end;

        $html = $head . tag('title','Hello/Index') . $style . 
            $body
            . tag('h1','Hello')
            . tag('h3','Request') . tag('pre',"{$request}")
            . tag('h3','Response') . tag('pre',"{$response}")
            . $end;
        $response->setContent($html);
        return $response;
    }

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
}
