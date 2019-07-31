<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Order;

/***
 * 进阶系列 —— 通知
 * Class InvoicePaidNotification
 * @package App\Notifications
 */
class InvoicePaidNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $order;

    /**
     * 新建通知实例.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * 获取通知的传递通道.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * 获取通知的邮件表示形式.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /*$url = url('/order/'.$this->order->order_id);
        return (new MailMessage)
            ->greeting('你好!')
            ->line('你的一张发票已经付款了!')
            ->action('查看发票', $url)
            ->line('感谢您使用我们的应用程序!');*/

        // 使用通知邮件的模板
//        return (new MailMessage)->view(
//            'emails.orders.shipped',
//            [
//                'shippingUser' => $this->order->shipping_user,
//                'orderMoney' => $this->order->order_money,
//            ]
//        );

        // 错误消息
//        return (new MailMessage)
//            ->error('您下单失败了!')
//            ->subject('您的下单通知!')
//            ->line('感谢您使用我们的应用程序!');
    }

    /**
     * 获取通知的数组表示形式.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
