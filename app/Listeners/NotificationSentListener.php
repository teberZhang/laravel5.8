<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/***
 * 通知发送后 —— 触发事件
 * 注册在
 * EventServiceProvider中
 *
 * Class NotificationSentListener
 * @package App\Listeners
 */
class NotificationSentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationSent  $event
     * @return void
     */
    public function handle(NotificationSent $event)
    {
        Log::info('--------------通知发送后事件---------------');
        Log::info('event->channel:' . $event->channel);
        Log::info('event->notifiable:' . json_encode($event->notifiable));
        Log::info('event->notification:' . json_encode($event->notification));
        Log::info('event->response:' . json_encode($event->response));
    }
}
