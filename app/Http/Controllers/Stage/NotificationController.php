<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaidNotification;
use App\Notifications\NewsBroadcastNotification;
use Carbon\Carbon;

/***
 * 进阶系列 —— 通知
 * Class NotificationController
 * @package App\Http\Controllers\Stage
 */
class NotificationController extends Controller
{

    /***
     * 邮件通知
     * @param Request $request
     * @return string
     */
    public function mailNotification(Request $request)
    {
        /***
         * 发送方式 1 Notification 门面普通邮件通知
         * php artisan queue:work
         */
        $user = \App\Models\User::find(2);
        $order = \App\Models\Order::find(1);
        Notification::send($user, new InvoicePaidNotification($order));

        /***
         * 发送方式 2 使用 Notifiable Trait
         * UserModel中要 trait 引入 Notifiable
         * 延迟通知 delay
         */
//        $when = Carbon::now()->addMinutes(1);
//        $user->notify((new InvoicePaidNotification($order))->delay($when));

        // 单独发给某人
//        Notification::route('mail', '2660745481@qq.com')
//            ->notify(new InvoicePaidNotification($order));

        return 'success';
    }

    /***
     * 广播通知
     * laravel-echo-server start
     * php artisan queue:work
     * 访问下面的方法发送通知
     * 通知监听查看页面：
     * http://local.laravel58.com/newsBroadcastNotification
     *
     * routes 文件中要注册 channel
     * App.Models.User.{id}
     *
     */
    public function broadcastNotification()
    {
        $titles = [
            '博物馆开夜场 奇妙夜亮起来',
            '198家出版社全球征稿？假的！',
            '老舍戏剧节汇聚国内外12部好戏',
            '第二十六届北京图博会举旗待发',
            '山东市场监管局：外出选餐厅要看安全量化等级',
            '浙江打造放心消费升级版',
            '凯迪拉克XT6测试谍照曝光 有望底特律车展亮相-盖世汽车资讯',
            '专家称车企对国六准备不足，深圳已实施 北京将推迟',
            '区财政局稳步推进医疗收费电子票据改革',
        ];
        $news = ['title' => $titles[rand(0, (count($titles) - 1))]];
        $user = \App\Models\User::find(29);
        $user->notify((new NewsBroadcastNotification($news)));
        return 'success';
    }
}
