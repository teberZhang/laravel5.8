<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/***
 * 商品详情表
 * Class ProductInfo
 * @package App
 */
class ProductInfo extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'product_info';

    /**
     * 表主键
     *
     * @var integer
     */
    protected $primaryKey = 'product_id';

    /**
     * 获取该商品的品牌 一对一相对的关联
     */
    public function brand()
    {
        /***
         * @uses param2=>ProductInfo表brand_id(外键)、param3=>brand_info表主键默认id
         * @uses withDefault=>在匹配不到情况下会使用
         */
        return $this->belongsTo('App\BrandInfo','brand_id','brand_id')->withDefault(function ($brandInfo) {
            $brandInfo->brand_name = '其他品牌';
        });;
    }

    /**
     * 获取该商品的图片 一对多
     */
    public function pics()
    {
        return $this->hasMany('App\ProductPicInfo','product_id','product_id');
    }
}
