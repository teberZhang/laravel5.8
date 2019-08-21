<?php

namespace App\Http\Controllers\Mongodb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MongodUserModel;

/***
 * Mongodb Model —— 操作
 * Class CurdModelController
 * @package App\Http\Controllers\Mongodb
 *
 * 使用方法：https://github.com/jenssegers/laravel-mongodb
 * 还有ORM对应关系
 *
 * MongodUserModel 中使用了 Uuid
 * 安装方法
 *
 */
class CurdModelController extends Controller
{
    public function index(Request $request)
    {
        /***
         * add
         */
//        $data = [
//            'name' => 'xiaohuang',
//            'email'  => 'xiaohuang@163.com',
//            'email_verified_at' => time(),
//            'password'  => 'e10adc3949ba59abbe56e057f20f883e',
//            'remember_token'  => '',
//            'country_id'  => 3,
//            'options'  => '',
//            'created_at'  => time(),
//            'updated_at'  => time(),
//        ];
//        $result = MongodUserModel::create($data);
//        $uuid = $result->uuid;
//        dump($uuid);

        /***
         * delete Model里面设置了软删除
         */
//        $result = MongodUserModel::where('uuid', '8cb8358c-8a77-4a2b-8e61-a14c84ad1e11')
//            ->delete();
//        dump($result);

        /***
         * update
         */
//        $data = [
//            'name' => 'chanshiguan',
//            'email' => 'chanshiguan@126.com',
//        ];
//        $result = MongodUserModel::where('uuid', 'a6624e72-0b1b-4ae6-8f29-c2035f5abb38')
//            ->update($data);
//        dump($result);

        /***
         * select
         */
//        $results = MongodUserModel::all();
//        dump($results);
        $result = MongodUserModel::where('uuid', 'a6624e72-0b1b-4ae6-8f29-c2035f5abb38')
            ->get();
        dump($result);
    }
}
