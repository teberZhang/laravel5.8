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

        $article_id = 2;
        $user = $this->request->user();
        $article = \App\Models\Article::find($article_id);

        // Gate判断当前用户是否有权限更新文章
        /*if (Gate::forUser($user)->allows('update-article', $article)) {
            return '有操作权限';
        }
        return '没有操作权限';*/

        /***
         * 使用 Policy 授权动作
         * php artisan make:policy ArticlePolicy --model=Models\Article(也可不指定model)
         * app\Providers\AuthServiceProvider.php
         * $policies中首先注册
         * ArticlePolicy@before(策略过滤器) 会率先执行
         */
        $user = $this->request->user();
        if ($user->can('update', $article)) {
            return '有操作权限';
        }
        return '没有操作权限';
    }
}
