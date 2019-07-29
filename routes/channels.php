<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// 授权频道
Broadcast::channel('order.{$orderId}', function ($user, $orderId) {
    return $user->id === \App\Models\Order::findOrNew($orderId)->user_id;
});

// 定义频道类 —— 注册频道
use App\Broadcasting\OrderChannel;
Broadcast::channel('order.{order}', OrderChannel::class);