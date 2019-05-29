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

        $values = Redis::lrange('names', 5, 10);
        var_dump(Redis::get('name'));
        var_dump($values);
    }
}
