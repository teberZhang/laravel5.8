<?php
/***
 * 间隔时钟定时器
 * 每隔 1000ms 执行一次
 * php app/Http/Controllers/Swoole/TimerTick.php
 */
//\Swoole\Timer::tick(1000, function () {
//    echo "Swoole 很棒\n";
//});

/***
 * 指定时钟定时器
 *  3000ms 后执行(一次性的)
 */
//\Swoole\Timer::after(3000, function () {
//    echo "Laravel 也很棒\n";
//});

/***
 * 清除定时器
 * 两个定时器都不会调用
 */
/*$timerId = \Swoole\Timer::tick(1000, function () {
    echo "Swoole 很棒\n";
});*/

//$timerId = \Swoole\Timer::after(1000, function () {
//    echo "Laravel 也很棒\n";
//});
//
//\Swoole\Timer::clear($timerId);

$count = 0;
\Swoole\Timer::tick(1000, function ($timerId, $count){
    global $count;
    echo "Swoole 很棒\n";
    $count++;
    if ($count == 3) {
        \Swoole\Timer::clear($timerId);
    }
} , $count);
