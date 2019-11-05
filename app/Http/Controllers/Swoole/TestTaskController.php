<?php

namespace App\Http\Controllers\Swoole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * 在 Laravel 中基于 Swoole 实现异步任务队列
 * 基于 Swoole HTTP 服务器访问路由才能成功投递异步任务只能通过访问
 * http://laravel-s.test/swooleTestTask
 * http://todo-s.test/swooleTestTask
 * 不能通过
 * http://local.laravel58.com/swooleTestTask
 * Php-fpm处理请求的方式访问
 *
 * Class TestTaskController
 * @package App\Http\Controllers\Swoole
 */
class TestTaskController extends Controller
{
    public function index(Request $request)
    {
        $task = new \App\Jobs\SwooleTestTaskJob('测试异步任务');
        // 异步投递任务，触发调用任务类的 handle 方法
        $success = \Hhxsv5\LaravelS\Swoole\Task\Task::deliver($task);
        // 任务完成调用回调
        if (is_bool($success) && $success) {
            $task->finish();
            var_dump('异步任务投递成功后完成业务回调');
        }
        var_dump($success);
    }
}
