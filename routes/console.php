<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

//自定义命令php artisan build project
Artisan::command('build {project}', function ($project) {
    $this->info("Building {$project}!");
    \Illuminate\Support\Facades\Log::info("Building {$project}!");
})->describe('第1个简单命令');

// 广播 —— public
Artisan::command('bignews', function () {
    broadcast(new \App\Events\NewsEvent(date('Y-m-d h:i:s A').": BIG NEWS!"));
    $this->comment("news sent");
})->describe('公共广播');

// 广播 —— private
Artisan::command('privatePush', function () {
    $user = \App\Models\User::find(29);
    broadcast(new \App\Events\PrivateMessageEvent($user,date('Y-m-d h:i:s A').": privatePush!"));
    $this->comment("privatePush sent");
})->describe('私有广播');

// 广播 —— presence
Artisan::command('presencePush', function () {
    $article = \App\Models\Article::find(rand(1,5));
    broadcast(new \App\Events\PresenceBroadcastEvent($article));
    $this->comment("presencePush sent");
})->describe('存在频道');
