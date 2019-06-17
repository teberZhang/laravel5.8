<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * Eloquent ORM —— 访问器 & 修改器
 * Class EloquentAttributeController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentAttributeController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        // ----------访问器 & 修改器----------------
        // 获取器 首字母大写
//        $user = \App\Models\User::find(3);
//        echo $user->name;

        // 修改器
//        $user = \App\Models\User::find(4);
//        $user->name = 'SAMI';
//        $user->save();

        // ----------日期修改器----------------
        // 要安装Datetime\Carbon依赖

        // ----------属性转换----------------
        // email_verified_at 转换成了 timestamp
//        $user = \App\Models\User::find(2);
//        echo $user->email_verified_at;

        // 数组 & JSON 转换
        $user = \App\Models\User::find(2);
        $options = $user->options;
        var_dump($options);
        /*$options['age'] = 18;
        $options['city'] = '杭州';
        $user->options = $options;
        $user->save();*/
    }
}
