<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/***
 * 文章表
 * Class Article
 * @package App
 */
class Article extends Model
{
    /**
     * 获取帖子的所有评论
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
