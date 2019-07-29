<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

/***
 * Eloquent ORM —— API 资源类
 * Class EloquentApiController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentApiController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        /***
         * 资源类(php artisan make:resource UserResource)
         * articles 有关联关系
         */
        $user = new UserResource(\App\Models\User::find(2));
        return $user;

        // 资源集合
//        $users = UserResource::collection(\App\Models\User::all());
//        return $users;

        // 自定义资源集合响应(php artisan make:resource UserCollection)
//        $users = new UserCollection(\App\Models\User::where('country_id',1)->get());
//        return $users;

        // 分页
//        $users = new UserCollection(\App\Models\User::paginate());
//        return $users;

        // 构造资源类时添加元数据
//        $users =  (new UserCollection(\App\Models\User::all()->load('articles')))
//            ->additional(['meta' => [
//                'key' => 'value',
//            ]]);
//        return $users;

        // -------------资源响应-------------
        // 第1种方法：链接 response 方法到资源类
//        $user = (new UserResource(\App\Models\User::find(1)))
//            ->response()
//            ->header('X-Value', 'True');
//        return $user;

        // 第2种方法 在资源类中定义一个 withResponse 方法
    }
}
