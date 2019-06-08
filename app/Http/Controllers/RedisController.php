<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

/***
 * Class RedisController
 * @package App\Http\Controllers
 * 数据库操作 —— Redis
 */
class RedisController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        Redis::set('name', 'Taylor');

        //$values = Redis::lrange('names', 5, 10);
        //var_dump(Redis::get('name'));
        //var_dump($values);
        /*$n = 60;
        for($i=1;$i<=$n;$i++) {
            Redis::ZADD("zadd:test",$i,$i+10000);
        }*/
        $affect = 0;
        $n = Redis::ZCARD("zadd:test");
        $max = 40;
        if($n > $max) {
            //移除有序集合中给定的排名区间的所有成员
            $affect = Redis::ZREMRANGEBYRANK("zadd:test" , 0 , $n - $max);
        }
        return $affect;

    }
}
