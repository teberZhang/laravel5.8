<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

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
        DB::listen(function ($query) {
             //var_dump($query->sql);
             //var_dump($query->bindings);
             //var_dump($query->time);
        });

        // 注册观察者
        \App\Models\Order::observe('App\Observers\OrderObserver');

        // 自定义多态关联的类型字段
        $this->bootEloquentMorphs();

        // Eloquent ORM —— API 资源类 数据最外层不包含data
        //JsonResource::withoutWrapping();
    }

    /**
     * 自定义多态关联的类型字段
     */
    private function bootEloquentMorphs()
    {
        Relation::morphMap([
            \App\Models\Article::TABLE => \App\Models\Article::class,
            \App\Models\Video::TABLE => \App\Models\Video::class,
        ]);
    }
}
