<?php

namespace App\Listeners;

use Hhxsv5\LaravelS\Swoole\Events\WorkerErrorInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Server;

/***
 * Swoole事件监听 —— 进程级别系统事件 —— WorkerError(当 Worker/Task 进程出现异常或错误时触发)
 * Class WorkerErrorEventListener
 * @package App\Listeners
 */
class WorkerErrorEventListener implements WorkerErrorInterface
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

    public function handle(Server $server, $workerId, $workerPId, $exitCode, $signal)
    {
        // TODO: Implement handle() method.
        Log::info('Worker/Task Process Error(当 Worker/Task 进程出现异常或错误时触发)', [
            $workerId, $workerPId, $exitCode, $signal
        ]);
    }
}
