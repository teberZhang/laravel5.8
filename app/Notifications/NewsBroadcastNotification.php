<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

/***
 * 进阶系列 —— 通知 —— 广播通知
 * Class NewsBroadcastNotification
 * @package App\Notifications
 */
class NewsBroadcastNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $news;

    /**
     * 新建通知实例.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * 获取通知的传递通道.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }

    /**
     * 获取通知的广播表示形式.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->news['title'],
        ]);
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
