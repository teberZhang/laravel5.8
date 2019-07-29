<?php

namespace App\Http\Controllers\Safety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * 安全系列 —— 重置密码
 * Class ResetpasswordController
 * @package App\Http\Controllers\Safety
 */
class ResetpasswordController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        //
    }
}
