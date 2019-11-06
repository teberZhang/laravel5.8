<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventServiceProvider extends ServiceProvider
{
    /**
     * 应用程序的事件侦听器映射(单个事件).
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // 用户登录成功触发事件(改到订阅者类了)
        //'Illuminate\Auth\Events\Login' => [
            //'App\Listeners\LogSuccessfulLogin',
        //],
        // 进阶系列 —— 通过事件和事件监听器实现服务解耦
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],
        /***
         * 邮件发送 —— 事件 —— 发送前后触发
         */
        'Illuminate\Mail\Events\MessageSending' => [
            'App\Listeners\MailSendingListener',
        ],
        'Illuminate\Mail\Events\MessageSent' => [
            'App\Listeners\MailSentListener',
        ],
        /***
         * 通知发送后触发的事件
         */
        'Illuminate\Notifications\Events\NotificationSent' => [
            'App\Listeners\NotificationSentListener',
        ],
    ];

    /**
     * 要注册的订阅者类(多个事件).
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // 手动注册事件(通配符事件监听器 —— 监听多个事件)
        Event::listen('event.test.*',function ($event, $param) {
            Log::info('通配符事件监听器 eventName = ' . $event . '&params = ' . json_encode($param));
        });

        /***
         * Swoole应用级别系统事件
         */
        // laravels.received_request
        Event::listen('laravels.received_request', function (Request $request, $app) {
            $request->query->set('get_key', 'swoole-get-param');// 修改 GET 请求参数
            $request->request->set('post_key', 'swoole-post-param'); // 修改 POST 请求参数
        });
        // laravels.generated_response
        Event::listen('laravels.generated_response', function (Request $request, Response $response, $app) {
            $response->headers->set('header-key', 'swoole-header-xiaoyongzi');
        });

    }
}
