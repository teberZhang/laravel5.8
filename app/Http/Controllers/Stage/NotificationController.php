<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaidNotification;
use Carbon\Carbon;

/***
 * 进阶系列 —— 通知
 * Class NotificationController
 * @package App\Http\Controllers\Stage
 */
class NotificationController extends Controller
{

    public function index(Request $request)
    {
        /***
         * UserModel中要 trait 引入 Notifiable
         * php artisan queue:work
         */
        // Notification 门面普通邮件通知
        $user = \App\Models\User::find(2);
        $order = \App\Models\Order::find(1);
        Notification::send($user, new InvoicePaidNotification($order));

        // UserModel 使用 Notifiable Trait
//        $when = Carbon::now()->addMinutes(1);
//        $user->notify((new InvoicePaidNotification($order))->delay($when));

        // 单独发给某人
//        Notification::route('mail', '2660745481@qq.com')
//            ->notify(new InvoicePaidNotification($order));

        return 'success';
    }
}
