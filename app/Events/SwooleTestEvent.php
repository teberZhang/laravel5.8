<?php

namespace App\Events;

use Hhxsv5\LaravelS\Swoole\Task\Event;

/***
 * Swoole —— 事件监听 —— 自定义异步事件监听及处理 —— 事件类
 * Class SwooleTestEvent
 * @package App\Events
 */
class SwooleTestEvent extends Event
{
    private $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
