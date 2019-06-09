<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/***
 * 商品品牌表
 * Class BrandInfo
 * @package App
 */
class BrandInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'brand_info';

    /**
     * 表主键
     *
     * @var integer
     */
    protected $primaryKey = 'brand_id';
}
