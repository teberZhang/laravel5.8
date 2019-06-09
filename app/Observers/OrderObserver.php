<?php
namespace App\Observers;

use App\Order;
use Illuminate\Support\Facades\Log;

/***
 * @desc 订单观察者
 * Class OrderObserver
 * @package App\Observers
 * @uses 要在AppServiceProvider 中注册观察者
 */
class OrderObserver
{
    /**
     * 监听订单创建事件.
     *
     * @param  Order $order
     * @return void
     */
    public function created(Order $order)
    {
        Log::info("-----------Order created successful---------");
    }

    /**
     * 监听订单删除事件.
     *
     * @param  Order $order
     * @return void
     */
    public function deleting(Order $order)
    {
        Log::info("-----------Order deleting successful---------");
    }
}