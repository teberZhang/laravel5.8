<?php

namespace App\Http\Controllers\Dao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/***
 * Class DbOperateController
 * @package App\Http\Controllers
 * 数据库操作 —— 快速入门
 * 监听查询事件 App\Providers\AppServiceProvider
 */
class DbOperateController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /***
     * 基本操作
     * @return mixed
     */
    public function select1()
    {
        //$users = DB::select('select * from users where name = ?', ['N0eaOrZNJ0']);
        $users = DB::select('select * from users where name = :name', ['name'=>'N0eaOrZNJ0']);
        return $users;
    }

    /***
     * 事务操作
     * @return mixed
     */
    public function transaction()
    {
        //闭包事务
        DB::transaction(function (){
            DB::table('users')
                ->where('id','=',1)
                ->update(['email_verified_at' => date("Y-m-d H:i:s")]);
            DB::table('users')->delete(1);
        });
    }

    /***
     * 处理死锁
     * 为此 transaction 方法接收一个可选参数作为第二个参数，
     * 用于定义死锁发生时事务的最大重试次数。如果尝试次数超出指定值，会抛出异常
     * @return mixed
     */
    public function deadlock()
    {
        DB::transaction(function (){
            DB::table('users')
                ->where('id','=',1)
                ->update(['email_verified_at' => date("Y-m-d H:i:s")]);
            DB::table('users')->delete(1);
        },5);
    }
}
