<?php

namespace App\Listeners;

use Hhxsv5\LaravelS\Swoole\Task\Event;
use Hhxsv5\LaravelS\Swoole\Task\Listener;
use Illuminate\Support\Facades\Log;

/***
 * Swoole —— 事件监听 —— 自定义异步事件监听及处理 —— 事件监听类
 * Class SwooleTestEventListener
 * @package App\Listeners
 */
class SwooleTestEventListener extends Listener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        Log::info(__CLASS__ . ': 开始处理', [$event->getData()]);
        sleep(3);// 模拟耗时代码的执行
        Log::info(__CLASS__ . ': 处理完毕');
    }
}
