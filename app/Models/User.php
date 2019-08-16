<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/***
 * 用户表
 * Class User
 * @package App\Models
 */
class User extends Model
{
    use Notifiable;

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
     * 在数组中隐藏的属性
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * 在数组中显示的属性
     *
     * @var array
     */
    //protected $visible = ['name', 'email'];

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

    /**
     * 邮件自发送定义接收人.
     * 如果不指定 邮件 或者 通知 —— 邮件 发送的时候会默认使用 email 属性
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /**
     * 用户接收广播通知的通道.
     *
     * @return array
     */
    /*public function receivesBroadcastNotificationsOn()
    {
        return 'users.'.$this->id;
    }*/
}
