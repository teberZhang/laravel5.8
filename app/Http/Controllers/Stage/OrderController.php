<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Events\OrderShipped;

/***
 * 进阶系列 —— 通过事件和事件监听器实现服务解耦 —— 分发事件
 * Class OrderController
 * @package App\Http\Controllers\Stage
 * EventServiceProvider 中注册事件/监听器 然后
 * php artisan event:generate 会自动创建没有创建的事件/监听器
 *
 * 对应消费队列
 * php artisan queue:work redis --queue=listeners
 */
class OrderController extends Controller
{
    /**
     * 处理给定订单.
     *
     * @return Response
     */
    public function ship()
    {
        $orderId = 1;
        $order = Order::findOrFail($orderId);

        // 订单处理逻辑...

        event(new OrderShipped($order));

        return 'success';
    }

    /***
     * 手动注册事件使用
     * EventServiceProvider.php boot方法中手动注册的通配符事件监听器event.test.*
     */
    public function evt()
    {
        // 通配符事件 —— 多个事件触发
        event('event.test.demo1',['data' => ['id' => 12, 'name' => 'Jack']]);
        event('event.test.demo2',['data' => ['id' => 18, 'name' => 'Tom']]);
        return 'success';
    }
}
