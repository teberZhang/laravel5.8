<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

/***
 * 进阶系列 —— 邮件 —— 邮件队列
 * Class OrderShippedQueueMail
 * @package App\Mail
 */
class OrderShippedQueueMail extends Mailable implements ShouldQueue
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
    public $queue = 'mail-queue';

    /**
     * 订单实例.
     *
     * @var Order
     */
    protected $order;

    /**
     * 新建消息实例.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * 构建消息.
     *
     * @return $this
     */
    public function build()
    {
        // 配置视图
        return $this->view('emails.orders.shippedqueue')
            // 映射变量
            ->with([
                'shippingUser' => $this->order->shipping_user,
                'orderMoney' => $this->order->order_money,
            ]);
    }

}
