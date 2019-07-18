<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessPodcastJob;
use App\Models\Order;

/***
 * 进阶系列 —— Laravel 队列系统实现及使用教程 —— 分发任务
 * Class PodcastController
 * @package App\Http\Controllers\Stage
 */
class PodcastController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store()
    {
        /***
         * 普通任务
         */
        /*$orderId = 13;
        $order = Order::findOrFail($orderId);
        ProcessPodcastJob::dispatch($order);*/

        /***
         * 延时分发
         */
        $orderId = 3;
        $order = Order::findOrFail($orderId);
        ProcessPodcastJob::dispatch($order)
            ->delay(now()->addMinutes(1));


        /***
         * 指定的队列
         */
        /*$orderId = 4;
        $order = Order::findOrFail($orderId);
        ProcessPodcastJob::dispatch($order)
            ->onQueue('processing');*/
        return $order;
    }
}
