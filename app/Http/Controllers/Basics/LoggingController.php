<?php

namespace App\Http\Controllers\Basics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

/***
 * Class LoggingController
 * @package App\Http\Controllers
 * 基础组件 —— 日志
 */
class LoggingController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function write()
    {
        Log::debug('debug-0001');
        Log::info('User failed to login.', ['id' => 20]);
        //写入指定频道
        Log::stack(['single', 'slack'])->info('Something happened!');
        return '日志写入成功';
    }

    /***
     * 404页面
     */
    public function notFound()
    {
        abort(404);
        //自定义错误结果
        //abort(403,'无法授权');
    }
}
