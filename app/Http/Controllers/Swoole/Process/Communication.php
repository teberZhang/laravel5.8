<?php
namespace App\Http\Controllers\Swoole\Process;

use Swoole\Process as swoole_process;

/***
 * 基于 Process 模块在 PHP 中实现多进程（二）：进程间通信 —— 管道通信（同步阻塞）
 * 数据单向流动（如果要实现异步通信，需要借助 swoole_event_add 函数将管道加入事件循环）
 * 从主进程传递命令 php --version 到子进程，子进程执行之后，将结果返回给主进程打印出来：
 * php app/Http/Controllers/Swoole/Process/Communication.php
 */
$process = new swoole_process(function (\Swoole\Process $worker) {
    // 子进程逻辑
    // 通过管道从主进程读取数据
    $cmd = $worker->read();
    ob_start();
    // 执行外部程序并显示未经处理的原始输出，会直接打印输出
    passthru($cmd);
    $ret = ob_get_clean() ? : ' ';
    $ret = trim($ret) . ". worker pid:" . $worker->pid . "\n";
    // 将数据写入管道
    $worker->write($ret);
    $worker->exit(0);  // 退出子进程
});  // Process 构造函数第三个参数默认为 true，启用管道，如果第二个参数也设置为 true，则在子进程中可以通过 echo 将数据写入管道

// 启动进程
$process->start();
// 从主进程将通过管道发送数据到子进程
$process->write('php --version');
//$process->write('php artisan inspire');
// 从子进程读取返回数据并打印
$msg = $process->read();
echo 'result from worker: ' . $msg;