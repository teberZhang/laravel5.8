<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * 应用提供的Artisan命令.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\SendEmails::class,
    ];

    /**
     * 定义应用的命令调度.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        /***
         * 闭包调度任务
         */
        $schedule->call(function () {
            Log::info('调度任务A');
        })->everyMinute();

        /***
         * 调度 Artisan 命令
         * 第1种方式可以调度 routes\console.php 中注册的自定义命令
         * 第2种方式可以调度 Console\Commands\ 下注册的命令
         */
        /*$schedule->command('build yaoxi')->everyMinute();
        $schedule
            ->command(\App\Console\Commands\SendEmails::class, ['tom jack --queue=kk --force'])
            ->everyMinute();*/

        /***
         * 调度队列任务
         * 正常分发任务在 Stage\PodcastController.php 通过 dispatch()方法进行分发
         * 第2个参数是队列名称
         */
        /*$schedule
            ->job(new \App\Jobs\ProcessPodcastJob(\App\Models\Order::find(3)), 'processing')
            ->everyMinute();*/

        /***
         * 调度 Shell 命令
         * 只是样例
         */
        /*$schedule
            ->exec('node /home/forge/script.js')
            ->daily();*/

        /***
         * 每年的10月3日凌晨2点1分向任务队列分发一个MyJob任务(样例)
         */
        //$schedule->job(new MyJob())->cron('1 2 3 10 *');

        /***
         * 每周星期一13:00运行一次...
         */
        /*$schedule->call(function () {
            //
        })->weekly()->mondays()->at('13:00');*/

        /***
         * 工作日的上午8点到下午5点每小时运行...
         */
        /*$schedule->command('build yaoxi')
            ->weekdays()
            ->hourly()
            ->timezone('Asia/Shanghai')
            ->between('8:00', '17:00');*/

        /***
         * 后台运行
         * @1 正常定时任务队列顺序执行,避免前面的任务执行时间太长会妨碍后面任务的按时执行
         * 使用 runInBackground 其原理是命令行指令最后加了一个 &
         *
         * @params command 执行command命令：php artisan build yaoxi
         * @params cron 每月1日的11:10:00执行该命令
         * @params timezone 设置时区
         * @params before 前置hook，命令执行前执行此回调
         * @params after 后置钩子，命令执行完之后执行此回调
         * @params runInBackground 后台运行
         */
        /*$schedule->command('build yaoxi')
        ->cron('10 11 1 * *')
        ->timezone('Asia/Shanghai')
        ->before(function(){})
        ->after(function(){})
        ->runInBackground();*/

        /***
         * 防止重复
         * 任务最频繁可以做到1分钟跑一次,为了防止本次任务1分钟之内没有完成。
         * 下一个任务已经来了。
         * 原理：给任务加锁，只有拿到任务锁之后，才能够执行任务的具体内容
         */
        //$schedule->command('build yaoxi')->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
