<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

/***
 * Class ArtisanSelfController
 * @package App\Http\Controllers
 * Artisan通过代码调用命令
 */
class ArtisanSelfController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        /**传递数组*/
        $exitCode = Artisan::call('email:send', [
            'user' => ['foo', 'bar'], '--queue' => 'release'
        ]);

        /**还可以指定 Artisan 命令被分发到的连接或队列*/
        /*Artisan::queue('email:send', [
            'user' => 1, '--queue' => 'default'
        ])->onConnection('redis')->onQueue('commands');*/
    }
}
