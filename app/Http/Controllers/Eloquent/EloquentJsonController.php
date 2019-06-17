<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * Eloquent ORM —— 序列化
 * Class EloquentJsonController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentJsonController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        // -----------------序列化模型 & 集合------------------
        // 序列化为数组 ***********
//        $user = \App\Models\User::with('articles')->first();
//        return $user->toArray();

        //整个模型集合为数组
//        $users = \App\Models\User::all();
//        return $users->toArray();

        // 序列化为 JSON ***********
//        $user = \App\Models\User::find(1);
//        return $user->toJson();
//        return $user->toJson(JSON_PRETTY_PRINT);

        // 还可以转化模型或集合为字符串，这将会自动调用 toJson 方法
//        $user = \App\Models\User::find(1);
//        return (string) $user;

        // 模型和集合在转化为字符串的时候会被转化为 JSON
        //return \App\Models\User::all();

        // -----------------在 JSON 中隐藏属性-----------------
        // model中加$hidden 属性

        // 临时暴露隐藏属性
        $user = \App\Models\User::find(2);
        return $user->makeVisible('password')->toArray();

        // 隐藏给定模型实例上某些显示的属性
//        $user = \App\Models\User::find(1);
//        return $user->makeHidden('email')->toArray();

        // -----------------追加值到 JSON-----------------

        // -----------------日期序列化-----------------
    }
}
