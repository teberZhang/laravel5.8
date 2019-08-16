<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

/***
 * 进阶系列 —— 邮件 —— 生成可邮寄类
 * Class OrderShippedMail
 * @package App\Mail
 */
class OrderShippedMail extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->view('emails.orders.shipped')
            // 自定义 SwiftMailer 消息
            ->withSwiftMessage(function ($message) {
                $message->getHeaders()
                    ->addTextHeader('Custom-Header', 'HeaderValue');
            })
            // 映射变量
            ->with([
                'shippingUser' => $this->order->shipping_user,
                'orderMoney' => $this->order->order_money,
            ])
            // 附件
            ->attach('a.jpg', [
                'as' => 'attach.jpg',
                'mime' => 'image/jpeg',
            ])
            // 原生数据附件(添加原生的字节字符串作为附件 —— 内存 —— 不存磁盘)
            ->attachData(Storage::get('a.jpg'), 'a.jpg', [
                'mime' => 'image/jpeg',
            ]);
    }
}
