<?php

namespace App\Broadcasting;

use App\User;

/***
 * 通知广播 —— private
 * userModel 对应的 App.User
 * Class UserNotificationBroadcastChannel
 * @package App\Broadcasting
 */
class UserNotificationBroadcastChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user, $id)
    {
        return (int) $user->id === (int) $id;
    }
}
