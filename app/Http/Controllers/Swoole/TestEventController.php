<?php

namespace App\Http\Controllers\Swoole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * Swoole事件监听 —— 自定义事件
 * Class TestEventController
 * @package App\Http\Controllers\Swoole
 */
class TestEventController extends Controller
{
    public function index(Request $request)
    {
        $event = new \App\Events\SwooleTestEvent('Swoole事件监听 —— 自定义事件 —— 测试异步事件监听及处理');
        $success = \Hhxsv5\LaravelS\Swoole\Task\Event::fire($event);
        var_dump($success);
    }
}
