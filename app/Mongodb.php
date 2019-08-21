<?php


namespace App;

use Illuminate\Support\Facades\DB;

/***
 * Mongodb连接类
 * Class Mongodb
 * @package App
 */
class Mongodb
{
    public static function connectionMongodb($tables)
    {
        return $users = Db::connection("mongodb")->collection($tables);
    }
}