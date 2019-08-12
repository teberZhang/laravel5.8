<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Article;

/***
 * 广播 —— Presence(存在频道)
 * Class PresenceBroadcastEvent
 * @package App\Events
 */
class PresenceBroadcastEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $article;

    /**
     * 创建一个新的事件实例.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * 获取事件应广播的公共频道.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // 存在频道
        return new PresenceChannel('presenceChannel');
    }

    /***
     * 广播内容
     * @return array
     */
    public function broadcastWith()
    {
        return ['id' => 'ssss', 'article' => $this->article];
    }

    /**
     * 广播的事件名称.如果未定义则默认为事件名称即 PresenceBroadcastEvent
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'presenceArticle';
    }
}
