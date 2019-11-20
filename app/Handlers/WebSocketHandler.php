<?php


namespace App\Handlers;

use Hhxsv5\LaravelS\Swoole\WebSocketHandlerInterface;
use Illuminate\Support\Facades\Log;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;
use Swoole\WebSocket\Server;

/***
 * 基于 Laravel + Swoole + Vue 组件实现支持高并发的实时弹幕功能
 * WebSocket 服务器
 * Class WebSocketHandler
 * @package App\Handlers
 */
class WebSocketHandler implements WebSocketHandlerInterface
{

    public function __construct()
    {
    }

    // 连接建立时触发
    public function onOpen(Server $server, Request $request)
    {
        // TODO: Implement onOpen() method.
        Log::info('WebSocket 连接建立:' . $request->fd);
    }

    // 收到消息时触发
    public function onMessage(Server $server, Frame $frame)
    {
        // TODO: Implement onMessage() method.
        // $frame->fd 是客户端 id，$frame->data 是客户端发送的数据
        Log::info("从 {$frame->fd} 接收到的数据: {$frame->data}");
        foreach($server->connections as $fd){
            if (!$server->isEstablished($fd)) {
                // 如果连接不可用则忽略
                continue;
            }
            $server->push($fd , $frame->data); // 服务端通过 push 方法向所有连接的客户端发送数据
        }
    }

    // 连接关闭时触发
    public function onClose(Server $server, $fd, $reactorId)
    {
        // TODO: Implement onClose() method.
        Log::info('WebSocket 连接关闭:' . $fd);
    }
}