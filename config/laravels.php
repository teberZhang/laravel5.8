<?php
/**
 * @see https://github.com/hhxsv5/laravel-s/blob/master/Settings-CN.md  Chinese
 * @see https://github.com/hhxsv5/laravel-s/blob/master/Settings.md  English
 */
return [
    'listen_ip'                => env('LARAVELS_LISTEN_IP', '127.0.0.1'),
    'listen_port'              => env('LARAVELS_LISTEN_PORT', 5200),
    'socket_type'              => defined('SWOOLE_SOCK_TCP') ? SWOOLE_SOCK_TCP : 1,
    'enable_coroutine_runtime' => false,
    'server'                   => env('LARAVELS_SERVER', 'LaravelS'),
    'handle_static'            => env('LARAVELS_HANDLE_STATIC', false),
    'laravel_base_path'        => env('LARAVEL_BASE_PATH', base_path()),
    'inotify_reload'           => [
        'enable'        => env('LARAVELS_INOTIFY_RELOAD', false),
        'watch_path'    => base_path(),
        'file_types'    => ['.php'],
        'excluded_dirs' => [],
        'log'           => true,
    ],
    // Swoole事件监听 —— 进程级别系统事件
    'event_handlers'           => [
        'WorkerStart' => \App\Listeners\WorkerStartEventListener::class,
        'WorkerStop'  => \App\Listeners\WorkerStopEventListener::class,
        'WorkerError' => \App\Listeners\WorkerErrorEventListener::class,
    ],
    'websocket'                => [
        /***
         * 在 Laravel 中集成 Swoole 实现 WebSocket 服务器
         * 客户端发送消息给服务端，服务端将消息返回给客户端。
         */
//        'enable' => true,
//        'handler' => \App\Services\WebSocketService::class,

        /***
         * 实时弹幕 —— WebSocket 服务器
         * 客户端发送消息，服务端发送给所有连接的客户端
         */
        'enable'  => true,
        'handler' => \App\Handlers\WebSocketHandler::class,
    ],
    'sockets'                  => [],
    // 协程 —— 注册自定义进程(1s执行1次)
    'processes'                => [
        //[
        //    'class'    => \App\Processes\TestProcess::class,
        //    'redirect' => false, // Whether redirect stdin/stdout, true or false
        //    'pipe'     => 0 // The type of pipeline, 0: no pipeline 1: SOCK_STREAM 2: SOCK_DGRAM
        //    'enable'   => true // Whether to enable, default true
        //],
        [
            'class'    => \App\Processes\TestProcess::class,
            'redirect' => false, // 是否将输入输出重定向到 stdin/stdout, true or false
            'pipe'     => 0, // 管道类型, 0: 不使用管道 1: SOCK_STREAM 2: SOCK_DGRAM
            'enable'   => false,
        ],
    ],
    'timer'                    => [
        'enable'        => true,
        'jobs'          => [
            // Enable LaravelScheduleJob to run `php artisan schedule:run` every 1 minute, replace Linux Crontab
            //\Hhxsv5\LaravelS\Illuminate\LaravelScheduleJob::class,
            // Two ways to configure parameters:
            // [\App\Jobs\XxxCronJob::class, [1000, true]], // Pass in parameters when registering
            // \App\Jobs\XxxCronJob::class, // Override the corresponding method to return the configuration
            // 基于 Swoole 定时器实现毫秒级任务调度
            \App\Jobs\Timer\TestCronJob::class,
        ],
        'max_wait_time' => 5,
    ],
    // Swoole事件监听 —— 自定义事件与事件监听器的映射关系
    'events'                   => [
        \App\Events\SwooleTestEvent::class => \App\Listeners\SwooleTestEventListener::class,
    ],
    // Swoole\Table 实现 Swoole 多进程数据共享
    'swoole_tables'            => [
        'ws' => [ // 表名，会加上 Table 后缀，比如这里是 wsTable
            'size'   => 102400, //  表容量
            'column' => [ // 表字段，字段名为 value
                ['name' => 'value', 'type' => \Swoole\Table::TYPE_INT, 'size' => 8],
            ],
        ],
        // 还可以定义其它表
    ],
    // 中间件或者服务提供者中处理新请求时销毁已存在的单例服务
    'register_providers'       => [],
    // 单例服务清理器（每次请求处理完后清除:比如用户认证相关）
    'cleaners'                 => [
        // If you use the session/authentication/passport in your project
        // Hhxsv5\LaravelS\Illuminate\Cleaners\SessionCleaner::class,
        // Hhxsv5\LaravelS\Illuminate\Cleaners\AuthCleaner::class,

        // If you use the package "tymon/jwt-auth" in your project
        // Hhxsv5\LaravelS\Illuminate\Cleaners\SessionCleaner::class,
        // Hhxsv5\LaravelS\Illuminate\Cleaners\AuthCleaner::class,
        // Hhxsv5\LaravelS\Illuminate\Cleaners\JWTCleaner::class,

        // If you use the package "spatie/laravel-menu" in your project
        // Hhxsv5\LaravelS\Illuminate\Cleaners\MenuCleaner::class,
        // ...
    ],
    'destroy_controllers'      => [
        'enable'        => false,
        'excluded_list' => [
            //\App\Http\Controllers\TestController::class,
        ],
    ],
    'swoole'                   => [
        'daemonize'          => env('LARAVELS_DAEMONIZE', false),
        'dispatch_mode'      => 2,
        'reactor_num'        => function_exists('swoole_cpu_num') ? swoole_cpu_num() * 2 : 4,
        'worker_num'         => function_exists('swoole_cpu_num') ? swoole_cpu_num() * 2 : 8,
        'task_worker_num'    => function_exists('swoole_cpu_num') ? swoole_cpu_num() * 2 : 8,
        // task worker 与 worker 进程之间的通信模式，1 表示通过 unix socket，2 表示使用消息队列
        'task_ipc_mode'      => 1,
        'task_max_request'   => 8000,
        'task_tmpdir'        => @is_writable('/dev/shm/') ? '/dev/shm' : '/tmp',
        'max_request'        => 8000,
        'open_tcp_nodelay'   => true,
        'pid_file'           => storage_path('laravels.pid'),
        'log_file'           => storage_path(sprintf('logs/swoole-%s.log', date('Y-m'))),
        'log_level'          => 4,
        'document_root'      => base_path('public'),
        'buffer_output_size' => 2 * 1024 * 1024,
        'socket_buffer_size' => 128 * 1024 * 1024,
        'package_max_length' => 4 * 1024 * 1024,
        'reload_async'       => true,
        'max_wait_time'      => 60,
        'enable_reuse_port'  => true,
        // LaravelS 代码中启用 Swoole 协程
        'enable_coroutine'   => true,
        'http_compression'   => false,

        // Slow log
        // 'request_slowlog_timeout' => 2,
        // 'request_slowlog_file'    => storage_path(sprintf('logs/slow-%s.log', date('Y-m'))),
        // 'trace_event_worker'      => true,

        // 每隔 60s 检测一次所有连接，如果某个连接在 600s 内都没有发送任何数据，则关闭该连接
        'heartbeat_idle_time'      => 600,
        'heartbeat_check_interval' => 60,

        /**
         * More settings of Swoole
         * @see https://wiki.swoole.com/wiki/page/274.html  Chinese
         * @see https://www.swoole.co.uk/docs/modules/swoole-server/configuration  English
         */
    ],
];
