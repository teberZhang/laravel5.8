<?php

namespace App\Broadcasting;

use App\User;
use App\Models\Order;

/***
 * 进阶系列 —— 广播 —— 定义频道类
 * Class OrderChannel
 * @package App\Broadcasting
 */
class OrderChannel
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
     * @param  \App\User $user
     * @param Order $order
     * @return array|bool
     */
    public function join(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
}
