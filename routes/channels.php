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

// 广播通知 —— userModel 如果发送通知用的 App.User
Broadcast::channel('App.User.{id}', App\Broadcasting\UserNotificationBroadcastChannel::class);

// 广播通知 —— userModel 如果发送通知用的 App.Models.User
Broadcast::channel('App.Models.User.{id}', App\Broadcasting\UserNotificationBroadcastChannel::class);

// 广播通道news —— public
Broadcast::channel('news', App\Broadcasting\NewsPublicBroadcastChannel::class);

// 广播通道 —— private
Broadcast::channel('privatePush.{id}', App\Broadcasting\NewsPrivateBroadcastChannel::class);

// 广播通道 —— presence
Broadcast::channel('presenceChannel', App\Broadcasting\NewsPresenceBroadcastChannel::class);