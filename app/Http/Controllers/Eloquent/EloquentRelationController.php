<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductInfo;
use App\BrandInfo;

/***
 * Eloquent ORM —— 关联关系
 * Class EloquentRelationController
 * @package App\Http\Controllers\Eloquent
 */
class EloquentRelationController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index() {
        // 获取该商品的品牌 一对一相对的关联
        /*$product = ProductInfo::find(3);
        return $product->brand->brand_name;*/

        //获取该商品的图片 一对多
        $pics = ProductInfo::find(1);
        //$picInfo = $pics->pics;
        //dd($picInfo);

        //获取该商品的图片(可用的) 一对多
        $picsUsed = $pics->pics()->where('pic_status',1)->get();
        dd($picsUsed);
    }
}
