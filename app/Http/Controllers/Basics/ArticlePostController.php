<?php

namespace App\Http\Controllers\Basics;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * 基础组件 —— 表单验证
 * php artisan make:controller ArticleController --resource 命令自动生成
 */
class ArticlePostController extends Controller
{
    /**
     * 显示创建新的博客文章的表单
     *
     * @return Response
     */
    public function create()
    {
        return view('article.index');
    }

    /**
     * 存储新的博客文章
     *
     * @param  StoreBlogPostRequest  $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {
        // 验证通过，存储到数据库...
        return 'store';
    }

    /**
     * 存储新的博客文章
     *
     * @param  Request  $request
     * @return Response
     */
    public function stores(Request $request)
    {
        //手动创建验证器
        /*$validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author.name' => 'required',
            'author.desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('postArticle/create')
                ->withErrors($validator)
                ->withInput();
        }*/


        //自动重定向
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author.name' => 'required',
            'author.desc' => 'required',
        ])->validate();

        // 存储博客文章...
    }
}
