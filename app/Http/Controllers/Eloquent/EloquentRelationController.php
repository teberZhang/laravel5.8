<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductInfo;
use App\BrandInfo;
use App\ProductPicInfo;

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
        //$pics = ProductInfo::find(1);
        //$picInfo = $pics->pics;
        //dd($picInfo);

        //获取该商品的图片(可用的) 一对多
        //$picsUsed = $pics->pics()->where('pic_status',1)->get();
        //dd($picsUsed);

        //根据图片查找商品
        /*$productPicsInfo = ProductPicInfo::find(4);
        $product = $productPicsInfo->product;
        dd($product);*/

        //-----------------------多对多----------------------
        //使用的表 admins roles admin_role
        /***
         * 查找管理员ID=1对应的角色列表
         */
        /*$admin = \App\Admin::find(1);
        $roles = $admin->roles;
        dd($roles);*/

        /***
         * 查找角色ID=2对应的管理员列表
         */
//        $role = \App\Role::find(2);
//        $admins = $role->admins;
//        dd($admins);

        /***
         * 获取中间表字段
         */
        /*$admin = \App\Admin::find(1);

        foreach ($admin->roles as $role) {
            echo $role->pivot->created_at;
        }*/

        //-----------------------远层的一对多----------------------
        //涉及到的表 users countries articles
        /***
         * @uses 获取指定国家的所有文章
         * users 中有 country_id 字段
         * articles 中有user_id 字段
         */
//        $country = \App\Country::find(1);
//        $articles = $country->articles;
//        dd($articles);

        //-----------------------多态关联----------------------
        $article = \App\Article::find(1);
        $comments = $article->comments;
        dd($comments);

    }
}
