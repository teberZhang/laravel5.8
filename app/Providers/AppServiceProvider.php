<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //监听查询事件
        /*DB::listen(function ($query) {
             var_dump($query->sql);
             var_dump($query->bindings);
             var_dump($query->time);
        });*/

        // 注册观察者
        \App\Models\Order::observe('App\Observers\OrderObserver');
    }
}
