<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

/***
 * 进阶系列 —— 通过事件和事件监听器实现服务解耦 —— 事件订阅者
 * 订阅多个事件的类(多个)
 * Class UserEventSubscriber
 * @package App\Listeners
 */
class UserEventSubscriber
{
    /**
     * 处理用户登录事件.
     */
    public function onUserLogin($event)
    {
        Log::info('用户登录了 ===' . json_encode($event->user));
    }

    /**
     * 处理用户退出事件.
     */
    public function onUserLogout($event)
    {
        Log::info('用户退出了 ===' . json_encode($event->user));
    }

    /**
     * 为订阅者注册监听器.
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}
