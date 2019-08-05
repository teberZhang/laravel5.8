<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;

/***
 * 广播 —— private —— Event (需要用户登录)
 *
 * 访问：http://local.laravel58.com/privatePush
 * 运行依次执行：
 * laravel-echo-server start
 * php artisan queue:work
 * php artisan privatePush
 *
 * Class PrivateMessageEvent
 * @package App\Events
 */
class PrivateMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /***
     * @var 用户
     */
    protected $user;

    /***
     * @var 消息内容
     */
    protected $message;

    /**
     * 事件被推送的队列名称.
     *
     * @var string
     */
    //public $broadcastQueue = 'privateMessage-queue';

    /**
     * 创建一个新的事件实例.
     *
     * @param User $user
     * @param String $message
     */
    public function __construct(User $user, String $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * 获取事件应广播的公共频道.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('privatePush.' . $this->user->id);
    }

    /***
     * 广播内容
     * @return array
     */
    public function broadcastWith()
    {
        return ['message' => $this->message, 'user' => $this->user, 'event' => 'PrivateMessageEvent'];
    }

    /**
     * 广播的事件名称.如果未定义则默认为事件名称即 PrivateMessageEvent
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'privateMessage';
    }

    /**
     * 判定事件是否广播
     *
     * @return bool
     */
    public function broadcastWhen()
    {
        return $this->user->id > 0;
    }
}
