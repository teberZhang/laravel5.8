<?php

namespace App\Http\Controllers\Stage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/***
 * 进阶系列 —— 辅助函数
 * Class FunctionController
 * @package App\Http\Controllers\Stage
 */
class FunctionController extends Controller
{
    public function index()
    {
        // array_add 函数添加给定键值对到数组 —— 如果给定键不存在的话：['name' => 'Desk', 'price' => 100]
//        $array = array_add(['name' => 'Desk'], 'price', 100);
//        dump($array);

        // array_collapse 函数将多个数组合并成一个：[1, 2, 3, 4, 5, 6, 7, 8, 9]
        $array = array_collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        dump($array);

    }
}
