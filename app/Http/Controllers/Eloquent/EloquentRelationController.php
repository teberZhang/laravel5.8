<?php

namespace App\Http\Controllers\Eloquent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /***
     * Eloquent ORM —— 关联关系 —— 关联关系
     */
    public function index() {
        // 获取该商品的品牌 一对一相对的关联
//        $product = \App\Models\ProductInfo::find(3);
//        return $product->brand->brand_name;

        //获取该商品的图片 一对多
//        $pics = \App\Models\ProductInfo::find(1);
//        $picInfo = $pics->pics;
//        dd($picInfo);

        //获取该商品的图片(可用的) 一对多
//        $pics = \App\Models\ProductInfo::find(1);
//        $picsUsed = $pics->pics()->where('pic_status',1)->get();
//        dd($picsUsed);

        //根据图片查找商品
//        $productPicsInfo = \App\Models\ProductPicInfo::find(4);
//        $product = $productPicsInfo->product;
//        dd($product);

        //-----------------------多对多----------------------
        //使用的表 admins roles admin_role
        /***
         * 查找管理员ID=1对应的角色列表
         */
//        $admin = \App\Models\Admin::find(1);
//        $roles = $admin->roles;
//        dd($roles);

        /***
         * 查找角色ID=2对应的管理员列表
         */
//        $role = \App\Models\Role::find(2);
//        $admins = $role->admins;
//        dd($admins);

        /***
         * 获取中间表字段
         */
//        $admin = \App\Models\Admin::find(1);
//
//        foreach ($admin->roles as $role) {
//            echo $role->pivot->admin_id;
//        }

        //-----------------------远层的一对多----------------------
        //涉及到的表 users countries articles
        /***
         * @uses 获取指定国家的所有文章
         * users 中有 country_id 字段
         * articles 中有user_id 字段
         */
//        $country = \App\Models\Country::find(1);
//        $articles = $country->articles;
//        dd($articles);

        //-----------------------多态关联----------------------
        /***
         * @desc 获取文章ID=1 的所有评论
         * @use 需要在 App\Providers\AppServiceProvider中 自定义多态关联的类型字段
         */
//        $article = \App\Models\Article::find(1);
//        $comments = $article->comments;
//        dd($comments);

        /***
         * @desc 获取视频ID=1 的所有评论
         * @use 需要在 App\Providers\AppServiceProvider中 自定义多态关联的类型字段
         */
//        $video = \App\Models\Video::find(1);
//        $comments = $video->comments;
//        dd($comments);

        // 根据评论获取文章或者视频信息
//        $comment = \App\Models\Comment::find(1);
//        $commentable = $comment->commentable;
//        dd($commentable);

        //-----------------------多对多的多态关联----------------------
        /***
         * @desc 获取文章ID=1 的所有标签
         * @use 需要在 App\Providers\AppServiceProvider中 自定义多态关联的类型字段
         */
//        $article = \App\Models\Article::find(1);
//        $tags = $article->tags;
//        dd($tags);

        /***
         * @desc 获取视频ID=1 的所有标签
         * @use 需要在 App\Providers\AppServiceProvider中 自定义多态关联的类型字段
         */
//         $video = \App\Models\Video::find(1);
//         $tags = $video->tags;
//         dd($tags);

        //获取标签ID=1对应的所有的视频列表
        $tag = \App\Models\Tag::find(1);
        $videos = $tag->videos;
        dd($videos);
    }

    /***
     * Eloquent ORM —— 关联关系 —— 关联查询
     */
    public function sel()
    {
        // 获取用户ID=1下面的所有文章
//        $user = \App\Models\User::find(1);
//        $articles = $user->articles;
//        dd($articles);

        // -----------------------查询存在的关联关系----------------------
        // 获取所有至少有一条评论的文章...
//        $article = \App\Models\Article::has('comments')->get();
//        dd($article);

        // 获取所有至少有2条评论的文章...
//        $article = \App\Models\Article::has('comments', '>=', 2)->get();
//        dd($article);

        // 获取所有至少有一条评论获得投票的文章...(votes()方法我没有定义)
//        $article = \App\Models\Article::has('comments.votes')->get();
//        dd($article);

        // -----------------------无关联结果查询----------------------
        // 获取所有没有评论的文章
//        $article = \App\Models\Article::doesntHave('comments')->get();
//        dd($article);
        // 获取评论内容中不含有"巴蒂布洛克"的文章
//        $article = \App\Models\Article::whereDoesntHave('comments', function ($query) {
//            $query->where('body', 'like', '%巴蒂布洛克%');
//        })->get();
//        dd($article);

        // -----------------------统计关联模型----------------------
        // 统计每篇文章的评论数 多了一个新字段(comments_count)
//        $articles = \App\Models\Article::withCount('comments')->get();
//        dd($articles);

        // 统计每篇文章评论中包含"巴蒂布洛克"的评论数量=>可以添加多个关联关系和votes类似
//        $articles = \App\Models\Article::withCount(['comments' => function ($query) {
//            $query->where('body', 'like', '%巴蒂布洛克%');
//        }])->get();
//        dd($articles);

        // 每篇文章的评论总数comments以及评论中包含"巴蒂布洛克"的评论数量pending_comments
//        $articles = \App\Models\Article::withCount([
//            'comments',
//            'comments as pending_comments' => function ($query) {
//                $query->where('body', 'like', '%巴蒂布洛克%');
//            }
//        ])->get();
//        dd($articles);

        // -----------------------渴求式加载----------------------
        // 普通方式(10商品要查11次)获取所有的商品以及商品对应的品牌
//        $products = \App\Models\ProductInfo::all();
//        foreach ($products as $product) {
//            echo $product->brand->brand_name;
//        }

        // 用with只查2次
//        $products = \App\Models\ProductInfo::with('brand')->get();
//        foreach ($products as $product) {
//            echo $product->brand->brand_name;
//        }

        // 渴求式加载多个关联关系
//        $products = \App\Models\ProductInfo::with('brand','pics')->get();
//        foreach ($products as $product) {
//            dd($product->pics);
//        }

        // 嵌套的渴求式加载 产品有品牌 品牌有地区 (BrandInfo中的area()方法没设置) 暂不可用--
        //$products = \App\Models\ProductInfo::with('brand.area')->get();

        // 只查询品牌表中的 brand_id,brand_name 字段
//        $products = \App\Models\ProductInfo::with('brand:brand_id,brand_name')->get();
//        foreach ($products as $product) {
//            dd($product->brand);
//        }

        // 带条件约束的渴求式加载(好像不管用)
//        $users = \App\Models\User::with(['articles' => function ($query) {
//            $query->where('title', '=', '%Binance.com%');
//        }])->get();
//        dd($users);

        // -----------------------懒惰渴求式加载----------------------
        //在父模型获取后 然后 渴求式加载一个关联关系(可以加判断条件)
//        $products = \App\Models\ProductInfo::all();
//        if(1 > 0) {
//            $products->load('brand');
//        }

        // 接收查询实例
//        $products = \App\Models\ProductInfo::all();
//        $products->load(['brand' => function ($query) {
//            $query->orderBy('created_at', 'asc');
//        }]);

        // 如果想要在关系管理尚未被加载的情况下加载它
//        $product = \App\Models\ProductInfo::find(1);
//        $brand = $product->loadMissing('brand');
//        echo $brand->brand->brand_name;

    }

    public function savas() {
        // -----------------------插入 & 更新关联模型----------------------
        // save 方法 接收整个 Eloquent 模型
        // 为文章ID=2 增加一条新评论
//        $comment = new \App\Models\Comment(['body' => 'A new comment.'.rand(0,100)]);
//        $article = \App\Models\Article::find(2);
//        $article->comments()->save($comment);

        // 1次添加多条评论
//        $article = \App\Models\Article::find(4);
//        $article->comments()->saveMany([
//            new \App\Models\Comment(['body' => 'A new comment.'.rand(100,200)]),
//            new \App\Models\Comment(['body' => 'Another comment.'.rand(100,200)]),
//        ]);

        // create 方法 接收 原生 PHP 数组
        // 添加1条评论
//        $article = \App\Models\Article::find(5);
//        $comment = $article->comments()->create([
//            'body' => 'A new comment.',
//        ]);

        //添加多条评论
//        $article = \App\Models\Article::find(5);
//        $article->comments()->createMany(
//            [
//                'message' => 'A new comment.',
//            ],
//            [
//                'message' => 'Another new comment.',
//            ],
//        );

        // -----------------从属关联关系-----------------

        // -----------------多对多关联---------------------
        // 附加/分离-----

        // 管理员ID=6 添加一个6的角色
        // attach第2个参数可以添加额外的参数
        //$admin = \App\Models\Admin::find(1);

        //$admin->roles()->attach(6);

        // 从指定用户中移除角色...
        //$admin->roles()->detach(2);

        // 从指定用户移除所有角色...
        //$admin->roles()->detach();

        // 移除多个角色
        //$admin->roles()->detach([1, 2, 3]);

        // 添加多个角色
//        $admin->roles()->attach([
//            1 => ['updated_at' => date("Y-m-d H:i:s")],
//            2 => ['updated_at' => date("Y-m-d H:i:s")]
//        ]);

        // 同步关联------
        // 已经存在的角色删除然后重新添加
        //$admin = \App\Models\Admin::find(1);

        //$admin->roles()->sync([1, 2, 3, 5]);

        // 只添加不存在的角色
        //$admin->roles()->syncWithoutDetaching([1, 2, 3, 5]);

        // 切换关联------
        // 存在就删除 不存在就添加
        //$admin = \App\Models\Admin::find(1);
        //$admin->roles()->toggle([1, 2, 3]);

        // 更新中间表记录

        // -----------------触发父级时间戳更新---------------------
        /***
         * 更新图片信息自动更新商品表的 updated_at
         * App\Models\ProductPicInfo $touches要赋值
         */
//        $pic = \App\Models\ProductPicInfo::find(1);
//        $pic->pic_desc = 'iphone6s主图666';
//        $pic->save();
    }
}
