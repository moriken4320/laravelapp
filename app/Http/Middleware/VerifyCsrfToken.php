<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification. CSRF対策を適用しないアクションの配列
     *
     * @var array
     */
    protected $except = [
        'hello', // /helloにPOST送信された際にはCSRF対策が実行されなくなる。
        'hello/*', // /hello下に用意された全てのページでCSRF対策が行われなくなる。
    ];
}
