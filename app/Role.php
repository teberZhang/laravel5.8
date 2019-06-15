<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/***
 * 管理员角色表
 * Class Role
 * @package App
 */
class Role extends Model
{
    /**
     * 角色对应的管理员列表
     */
    public function admins()
    {
        /***
         * @param1 关联的模型
         * @param2 关联关系连接表的表名
         * @param3 定义关联关系模型的外键名称
         * @param4 要连接到的模型的外键名称
         */
        return $this->belongsToMany('App\Admin','admin_role',
            'role_id','admin_id')
            //->as('subscription') //自定义 pivot 属性名
            //->withTimestamps()
            //->wherePivot('id', '=',7) //过滤admin_role
            //->wherePivotIn('id', [1, 7]) //过滤admin_role
            ;
    }
}
