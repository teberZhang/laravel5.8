<?php

namespace App\Http\Controllers\Mongodb;

use App\Mongodb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/***
 * Mongodb 在 Controller 中的使用方法
 * Class CurdController
 * @package App\Http\Controllers\Mongodb
 */
class CurdController extends Controller
{
    public function index(Request $request)
    {
        $connection = Mongodb::connectionMongodb('m_users');

        /***
         *  添加模拟数据 add
         */
        /*$result = Db::table("users")->get();
        foreach ($result as $item)
        {
            $data = [
                'id' => $item->id,
                'name' => $item->name,
                'email'  => $item->email,
                'email_verified_at' => $item->email_verified_at,
                'password'  => $item->password,
                'remember_token'  => $item->remember_token,
                'country_id'  => $item->country_id,
                'options'  => $item->options,
                'created_at'  => $item->created_at,
                'updated_at'  => $item->updated_at,
            ];
            $connection->insert($data);
        }*/

        /***
         * delete
         */
        /*$result = $connection->where('name', 'jack')->delete();
        dump($result);*/

        /***
         * update
         */
        /*$result = $connection->where('name', 'roman')->update(['country_id' => 2]);
        dump($result);*/


        /***
         * select
         * get() 全部获取
         * paginate(6) 分页获取
         */
        //$result = $connection->get();
        $result = $connection->paginate(6);
        dump($result);

        return 'success';
    }
}
