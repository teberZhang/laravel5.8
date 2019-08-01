<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/***
 * 广播 —— public —— Event
 *
 * 访问：http://local.laravel58.com/newsroom
 * 运行依次执行：
 * laravel-echo-server start
 * php artisan queue:work
 * php artisan bignews
 *
 * Class NewsEvent
 * @package App\Events
 */
class NewsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $message;

    /**
     * 创建一个新的事件实例.
     *
     * @param $news_message
     */
    public function __construct($news_message)
    {
        $this->message = $news_message;
    }

    /**
     * 获取事件应广播的公共频道.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('news');
    }

    /**
     * 指定广播数据。
     *
     * @return array
     */
    public function broadcastWith()
    {
        // 返回当前时间
        return ['message' => $this->message, 'event' => 'NewsEvent'];
    }
}
