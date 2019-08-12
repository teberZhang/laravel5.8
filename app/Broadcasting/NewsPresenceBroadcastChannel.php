<?php

namespace App\Broadcasting;

use App\User;

/***
 * 广播 Channel —— Presence
 * Class NewsPrivateBroadcastChannel
 * @package App\Broadcasting
 */
class NewsPresenceBroadcastChannel
{
    /**
     * 创建新的通道实例.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 验证用户对频道的访问权限.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        return $user->id < 1 ? [$user->id, $user->name] : null;
    }
}
