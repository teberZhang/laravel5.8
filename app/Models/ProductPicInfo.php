<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * 要触发的所有关联关系
     * 更新图片信息自动更新商品表的 updated_at
     * @var array
     */
    protected $touches = ['product'];

    /**
     * 根据图片获取商品信息 一对多（逆向）
     */
    public function product()
    {
        return $this->belongsTo('App\Models\ProductInfo','product_id','product_id');
    }
}
