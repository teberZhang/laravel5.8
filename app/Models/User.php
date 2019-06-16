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
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * 应该被转化为原生类型的属性
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'timestamp',
        'options' => 'array',
    ];

    /**
     * 获取用户的用户名=>首字母大写
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * 设置用户的名字
     *
     * @param  string  $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * 获取指定用户的所有文章
     */
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
