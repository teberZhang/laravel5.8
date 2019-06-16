<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 管理员表
 * Class Admin
 * @package App
 */
class Admin extends Model
{
    /***
     * 管理员对应的角色列表
     */
    public function roles()
    {
        /***
         * @param1 关联的模型
         * @param2 关联关系连接表的表名
         * @param3 定义关联关系模型的外键名称
         * @param4 要连接到的模型的外键名称
         */
        return $this->belongsToMany('App\Models\Role','admin_role',
            'admin_id','role_id')
            //->as('subscription')
            ->withTimestamps()
            ;
    }
}
