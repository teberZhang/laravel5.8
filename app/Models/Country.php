<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 国家表
 * Class Country
 * @package App
 */
class Country extends Model
{
    /**
     * 关联到模型的数据表(这里可以不用设置默认 Country => countries)
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * 获取指定国家的所有文章
     */
    public function articles()
    {
        return $this->hasManyThrough(
            'App\Article',
            'App\User',
            'country_id', // users表使用的外键...
            'user_id', // articles表使用的外键...
            'id', // countries表主键...
            'id' // users表主键...
        );
    }
}
