<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;

/***
 * Markdown 邮件类
 * php artisan make:mail OrderShippedMarkdownMail --markdown=emails.orders.shippedmarkdown
 * Class OrderShippedMarkdownMail
 * @package App\Mail
 */
class OrderShippedMarkdownMail extends Mailable
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
        return $this->with([
            'url' => '',
        ])->markdown('emails.orders.shippedmarkdown');
    }
}
