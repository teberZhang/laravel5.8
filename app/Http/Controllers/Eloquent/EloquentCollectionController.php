<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * Eloquent ORM —— 集合
 * Class EloquentCollectionController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentCollectionController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {

        // 移除所有无效的模型并聚合剩下用户的姓名
        // 返回country_id=1 的用户名
//        $users = \App\Models\User::where('country_id', 1)->get();
//        $names = $users->reject(function ($user) {
//            return $user->country_id === false;
//        })->map(function ($user) {
//            return $user->name;
//        });
//        dd($names);

        // 自定义集合
    }
}
