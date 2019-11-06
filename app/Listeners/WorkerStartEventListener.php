<?php

namespace App\Listeners;

use Hhxsv5\LaravelS\Swoole\Events\WorkerStartInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Server;

/***
 * Swoole事件监听 —— 进程级别系统事件 —— WorkerStart（当 Worker/Task 进程启动时触发）
 * Class WorkerStartEventListener
 * @package App\Listeners
 */
class WorkerStartEventListener implements WorkerStartInterface
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(Server $server, $workerId)
    {
        // TODO: Implement handle() method.
        Log::info('Worker/Task Process Started(当 Worker/Task 进程启动时触发，此时 Laravel 初始化已经完成)', [
            $workerId
        ]);
    }
}
