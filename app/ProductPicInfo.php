<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/***
 * 商品图片信息表
 * Class ProductPicInfo
 * @package App
 */
class ProductPicInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'product_pic_info';

    /**
     * 表主键
     *
     * @var integer
     */
    protected $primaryKey = 'product_pic_id';
}
