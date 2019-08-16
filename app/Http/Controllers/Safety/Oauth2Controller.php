<?php

namespace App\Http\Controllers\Safety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * @desc 安全系列 —— API ——认证颁发访问令牌
 * Class Oauth2Controller
 * @package App\Http\Controllers
 */
class Oauth2Controller extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
