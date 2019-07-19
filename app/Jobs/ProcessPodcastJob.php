<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

/***
 * 进阶系列 —— Laravel 队列系统实现及使用教程 —— 创建任务类
 * php artisan make:job ProcessPodcastJob
 * Class ProcessPodcastJob
 * @package App\Jobs
 */
class ProcessPodcastJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * 可以尝试任务的次数（优先级比 Artisan 命令高）.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * 超时前任务可以运行的秒数（优先级比 Artisan 命令高）.
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * 创建新任务实例.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        Log::info('jobs === order_id = ' . $order->order_id);
    }

    /**
     * 执行任务.
     *
     * @param Order $order
     * @return void
     */
    public function handle(Order $order)
    {
        Log::info('消费了' . $order->toJson());
    }

    /**
     * 确定任务应超时的时间.
     * 指定时间内允许任务的最大尝试次数
     *
     * @return \DateTime
     */
    public function retryUntil()
    {
        return now()->addSeconds(5);
    }
}
