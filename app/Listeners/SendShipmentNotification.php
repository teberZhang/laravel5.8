<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/***
 * 监听器(事件监听器队列)
 * Class SendShipmentNotification
 * @package App\Listeners
 * 事件监听器队列 需要实现 ShouldQueue
 */
class SendShipmentNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * 任务将被推送到的连接名称.
     *
     * @var string|null
     */
    public $connection = 'redis';

    /**
     * 任务将被推送到的连接名称.
     *
     * @var string|null
     */
    public $queue = 'listeners';


    /**
     * 创建事件侦听器.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 处理事件.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        // 使用 $event->order 发访问订单...
        // 停止事件被传播到其它监听器可以 返回 false 来实现
        Log::info(json_encode($event->order));
    }

    /***
     * 处理失败任务
     * @param OrderShipped $event
     * @param $exception
     */
    public function failed(OrderShipped $event, $exception)
    {
        //
    }
}
