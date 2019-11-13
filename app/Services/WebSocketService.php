<?php


namespace App\Services;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/***
 * 在 Laravel 中集成 Swoole 实现 WebSocket 服务器
 * WebSocketService 类
 * Class WebSocketService
 * @package App\Services
 */
class WebSocketService implements WebSocketHandlerInterface
{

    public function __construct()
    {
    }

    // 连接建立时触发
    public function onOpen(Server $server, Request $request)
    {
        // TODO: Implement onOpen() method.
        // 在触发 WebSocket 连接建立事件之前，laravel 应用初始化的生命周期已经结束，你可以在这里获取
        // laravel 请求和会话数据
        // 调用 push方法向客户端推送数据，fd是客户端连接标示字段
        Log::info('WebSocket 连接建立:' . $request->fd);
        // wsTable 存储连接id
        app('swoole')->wsTable->set('fd:' . $request->fd, ['value' => $request->fd]);
        $server->push($request->fd, '欢迎使用基于laravelS的websocket服务器');
    }

    // 收到消息时触发
    public function onMessage(Server $server, Frame $frame)
    {
        // TODO: Implement onMessage() method.
        foreach (app('swoole')->wsTable as $key => $row) {
            if (strpos($key, 'fd:') === 0 && $server->exist($row['value'])) {
                Log::info('Receive message from client: ' . $row['value']);
                // 调用 push 方法向客户端推送数据
                $server->push($frame->fd, date("Y-m-d H:i:s") . ' 收到消息 ' . $frame->data);
            }
        }
    }

    // 关闭连接时触发
    public function onClose(Server $server, $fd, $reactorId)
    {
        // TODO: Implement onClose() method.
        // Log::info('WebSocket 连接关闭');
    }
}