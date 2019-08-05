<?php

namespace App\Http\Controllers\Safety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

/***
 * 安全系列 —— 授权
 * Class GrantController
 * @package App\Http\Controllers\Safety
 */
class GrantController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {

        /***
         * Gate
         * AuthServiceProvider —— boot 添加 update-article —— Gate注册授权
         */
        $article = \App\Models\Article::find(2);
        /***
         * 对当前登录用户
         */
        if (Gate::allows('update-article', $article)) {
            dump('当前用户可以更新文章...');
        }
        if (Gate::denies('update-article', $article)) {
            dump('当前用户不能更新文章...');
        }

        /***
         * 对指定用户判断是否有权限操作
         */
        if (Gate::forUser(\App\Models\User::find(4))->allows('update-article', $article)) {
            dump('当前用户可以更新文章...');
        }
        if (Gate::forUser(\App\Models\User::find(4))->denies('update-article', $article)) {
            dump('当前用户不能更新文章...');
        }

        /***
         * 使用 Policy 授权动作
         * php artisan make:policy ArticlePolicy --model=Models\Article(也可不指定model)
         * app\Providers\AuthServiceProvider.php
         * $policies中首先注册
         * ArticlePolicy@before(策略过滤器) 会率先执行
         */
        $user = $this->request->user();
        if ($user->can('update', $article)) {
            dump('有操作权限');
        }

        /***
         * 通过中间件 —— 放在routes —— web.php 测试
         */
//        Route::post('/article', function () {
//            dump('当前用户可以创建文章...');
//        })->middleware('can:create,App\Models\Article');
//
//        Route::get('hhha', function () {
//            return '<form method="POST" action="/article">' . csrf_field() . '<button type="submit">提交</button></form>';
//        });
    }
}
