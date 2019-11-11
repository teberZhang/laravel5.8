<?php
namespace App\Http\Controllers\Swoole\Process;

/***
 * Swoole 进程池的简单实现
 * 暂时报错
 * php app/Http/Controllers/Swoole/Process/Pool.php
 */
$workerNum = 5;
$pool = new Swoole\Process\Pool($workerNum);

$pool->on("WorkerStart", function ($pool, $workerId) {
    echo "Worker#{$workerId} is started\n";
    $redis = new Redis();
    $redis->pconnect('127.0.0.1', 6379);
    $key = "key1";
    while (true) {
        $msgs = $redis->brpop($key, 2);
        if ( $msgs == null)
            continue;
        var_dump($msgs);
        echo "Processed by Worker#{$workerId}\n";
    }
});

$pool->on("WorkerStop", function ($pool, $workerId) {
    echo "Worker#{$workerId} is stopped\n";
});

$pool->start();