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
     * @return void
     */
    public function handle()
    {
        //Log::info('消费了' . $this->order->toJson());
        Log::info(date("Y-m-d H:i:s") . '消费了' . $this->order->order_id);
    }

    /**
     * 清理失败的任务.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // 发送失败通知, etc...
    }

    /**
     * 确定任务应超时的时间.
     * 指定时间内允许任务的最大尝试次数
     * 我这里加了我的消费不一会就过期了
     *
     * @return \DateTime
     */
    /*public function retryUntil()
    {
        return now()->addSeconds(5);
    }*/
}
