<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\OrderShippedMail;
use App\Mail\OrderShippedMarkdownMail;
use App\Mail\OrderShippedQueueMail;
use Carbon\Carbon;

/***
 * 进阶系列 —— 邮件
 * Class MailController
 * @package App\Http\Controllers\Stage
 */
class MailController extends Controller
{
    public function index()
    {
        /***
         * 发送非 MarkDown 邮件
         */
        $orderId = 4;
        $order = Order::findOrFail($orderId);
        Mail::to(\App\Models\User::find(2))->send(new OrderShippedMail($order));

        /***
         * 发送 MarkDown 邮件
         */
        /*$orderId = 6;
        $order = Order::findOrFail($orderId);
        Mail::to(\App\Models\User::find(2))
            ->send(new OrderShippedMarkdownMail($order));*/

        /***
         * 渲染可邮寄类
         */
        // 不发送返回邮件内容,字符串方式返回
        //return (new \App\Mail\OrderShippedMail(Order::findOrFail(7)))->render();
        // 在浏览器中预览邮件
        //return new \App\Mail\OrderShippedMarkdownMail(Order::findOrFail(7));

        /***
         * 邮件队列
         */
        // 普通消息队列
//        Mail::to(\App\Models\User::find(2))
//            ->queue(new OrderShippedQueueMail(Order::findOrFail(3)));

        // 延迟消息队列
//        $when = Carbon::now()->addMinutes(1);
//        Mail::to(\App\Models\User::find(2))
//            ->later($when, new OrderShippedQueueMail(Order::findOrFail(3)));

        /***
         * 事件
         * EventServiceProvider $listen 中注册了事件监听器
         */

        return 'success';
    }
}
