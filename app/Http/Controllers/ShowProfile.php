<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 单动作控制器
 * 如果你想要定义一个只处理一个动作的控制器，可以在这个控制器中定义 __invoke 方法：
 * 这背后的原理是在 PHP 中当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用
*/

class ShowProfile extends Controller
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        return '单动作控制器-如果你想要定义一个只处理一个动作的控制器，
        可以在这个控制器中定义 __invoke 方法';
    }
}
