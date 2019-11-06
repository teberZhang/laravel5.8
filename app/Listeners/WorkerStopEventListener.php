<?php

namespace App\Listeners;

use Hhxsv5\LaravelS\Swoole\Events\WorkerStopInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Server;

/***
 * Swoole事件监听 —— 进程级别系统事件 —— WorkerStop(当 Worker/Task 进程正常退出时触发)
 * Class WorkerStopEventListener
 * @package App\Listeners
 */
class WorkerStopEventListener implements WorkerStopInterface
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
        Log::info('Worker/Task Process Stop(当 Worker/Task 进程正常退出时触发)', [
            $workerId
        ]);
    }
}
