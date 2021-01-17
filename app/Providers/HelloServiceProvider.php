<?php

namespace App\Providers;

use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer(
        //     'hello.index',
        //     'App\Http\Composers\HelloComposer'
        // );

        // HelloValidatorを読み込む
        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $messages){
        //     return new HelloValidator($translator, $data, $rules, $messages);
        // });

        // 特定のフォームだけオリジナルバリデーションを使いたい場合
        Validator::extend('hello', function($attribute, $value, $parameters, $validator){
            return $value % 2 == 0;
        });

    }
}
