<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

/***
 * 进阶系列 —— 缓存 —— memcached(我设置的默认)
 * Class CacheController
 * @package App\Http\Controllers\Stage
 */
class CacheController extends Controller
{
    public function index()
    {
        // 访问多个缓存存储
//        Cache::store("redis")->put('test-value1','hello kitty',60);
//        $value = Cache::get('test-value1','null');
//        var_dump($value);

        // 从缓存中获取数据(可以使用闭包)
//        $value = Cache::get('test-value2', function() {
//            return "no value";
//        });
//        var_dump($value);

        // 检查缓存项是否存在
//        if (Cache::store("file")->has("test-value1")) {
//            var_dump("文件缓存中有key = test的缓存");
//        }

        // 数值增加/减少
//        Cache::increment("test-add", 3);
//        Cache::decrement("test-add", 1);
//        $value = Cache::get("test-add");
//        var_dump($value);

        // 获取&存储
        // 缓存中不存在的话，从数据库获取它们并将其添加到缓存中(有设置ttl)
//        $value = Cache::store("file")->remember('test-users', 30, function() {
//            return \App\Models\User::find(1)->toJson();
//        });
//        var_dump($value);

        // 缓存中不存在的话，从数据库获取它们或者将其永久存储起来
//        $value = Cache::store("file")->rememberForever('users', function() {
//            return \App\Models\User::find(1)->toJson();
//        });
//        var_dump($value);

        // 获取&删除
        // 从缓存中获取缓存项然后删除
//        $value = Cache::store("file")->pull('test-users');
//        var_dump($value);

        // 在缓存中存储数据
//        Cache::put('test-value3','test-value3',30);

//        $expiresAt = Carbon::now()->addMinutes(10);
//        Cache::put('test-value4', 'test-value4', $expiresAt);
//        var_dump(Cache::get('test-value4'));

        // 缓存不存在时存储数据
//        Cache::add('test-value3','test-value3',30);
//        var_dump(Cache::get('test-value3'));

        // 从缓存中移除数据
//        Cache::put('test-value3','test-value3',30);
//        var_dump(Cache::get('test-value3'));
//        Cache::forget('test-value3');
//        var_dump(Cache::get('test-value3'));

    }

    public function tag()
    {
        // 缓存标签(不支持 file 或 database 缓存驱动)
        // 存储被打上标签的缓存项
        Cache::tags(['people', 'artists'])->put('John', 'John', 30);
        Cache::tags(['people', 'authors'])->put('Anne', 'Anne', 30);
        // 访问被打上标签的缓存项
        $john = Cache::tags(['people', 'artists'])->get('John');
        $anne = Cache::tags(['people', 'authors'])->get('Anne');
        var_dump($john);
        var_dump($anne);

        // 移除被打上标签的数据项
        // 移除被打上 people 或 authors 标签的所有缓存：
        Cache::tags(['people', 'authors'])->flush();
        $john = Cache::tags(['people', 'artists'])->get('John');
        $anne = Cache::tags(['people', 'authors'])->get('Anne');
        var_dump($john);
        var_dump($anne);

        // 移除被打上 authors 标签的语句
        Cache::tags('authors')->flush();
        $john = Cache::tags(['people', 'artists'])->get('John');
        $anne = Cache::tags(['people', 'authors'])->get('Anne');
        var_dump($john);
        var_dump($anne);
    }
}
