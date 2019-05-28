<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

/***
 * Class RedisSubscribe
 * @package App\Console\Commands
 * 数据库操作 —— Redis
 * 发布/订阅
 * 路由 http://local.laravel58.com/redis-publish
 */
class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to a Redis channel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**普通订阅*/
        /*Redis::subscribe(['test-channel'], function($message) {
            $this->info($message);
        });*/

        /**通配符订阅*/
        /*Redis::psubscribe(['*'], function($message, $channel) {
            $this->info($message);
        });*/

        Redis::psubscribe(['users.*'], function($message, $channel) {
            $this->info($message);
        });

    }
}
