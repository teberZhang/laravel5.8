<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/***
 * Class SqlBuilderController
 * @package App\Http\Controllers
 * 数据库操作 —— 查询构建器
 */
class SqlBuilderController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /***
     * 获取结果集
     */
    public function getAllResults() {

        //从一张表中取出所有行
        //$users = DB::table("users")->get();

        //从一张表中获取一行/一列
        //$users = DB::table("users")->where('id','<',10)->first();
        //echo $users->name;

        //该方法会直接返回指定列的值
        //$users = DB::table("users")->where('id','<',10)->value('name');

        //获取数据列值列表
        /*$names = DB::table('users')->pluck('name');
        foreach ($names as $name) {
            echo $name."<br/>";
        }*/

        //在返回数组中为列值指定自定义键
        $names = DB::table('users')->pluck('email','name');
        foreach ($names as $name => $email) {
            echo 'name='.$name.'&email='.$email."<br/>";
        }
    }

    /***
     * 组块结果集
     * 你可以通过从闭包函数中返回 false 来终止组块的运行
     */
    public function blockOperate()
    {
        DB::table('users')->orderBy('id')->chunk(10, function($users) {
            echo '---------------------'."<br/>";
            foreach ($users as $user) {
                echo $user->name."<br/>";
            }
        });
    }

    /***
     * 判断记录是否存在
     */
    public function existLine()
    {
        $isExist = DB::table('users')
            ->where('name', 'N0eaOrZNJ0')
            ->exists();
        $isNotExist = DB::table('users')
            ->where('name', 'N0eaOrZNJ0')
            ->doesntExist();
    }

    /***
     * 查询（Select）
     */
    public function selectdemo()
    {
        //查询指定的列
        /*$users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();*/

        //distinct 方法允许你强制查询返回不重复的结果集
        //$users = DB::table('users')->distinct()->get();

        //追加一个列到查询
        $query = DB::table('users')->select('name');
        $users = $query->addSelect('email')->get();

        return $users;
    }

    /***
     * 原生表达式
     */
    public function ysql()
    {
        //selectRaw
        $users = DB::table('users')
            ->selectRaw('id * ? as id_with_tax', [2])
            ->get();

        //whereRaw可选的绑定数组
        /*$users = DB::table('orders')
            ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
            ->get();*/

        //havingRaw
        /*$orders = DB::table('orders')
            ->select('department', DB::raw('SUM(price) as total_sales'))
            ->groupBy('department')
            ->havingRaw('SUM(price) > 2500')
            ->get();*/

        //orderByRaw
        /*$orders = DB::table('orders')
            ->orderByRaw('updated_at - created_at DESC')
            ->get();*/
        return $users;
    }
}
