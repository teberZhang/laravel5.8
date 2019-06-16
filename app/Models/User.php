<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 用户表
 * Class User
 * @package App\Models
 */
class User extends Model
{
    /**
     * 获取指定用户的所有文章
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
