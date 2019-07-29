<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 文章表
 * Class Article
 * @package App
 */
class Article extends Model
{
    const TABLE = 'articles';

    protected $table = self::TABLE;

    /**
     * 获取帖子的所有评论(多态一对多)
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    /**
     * 获取指定文章所有标签(多态多对多)
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * 获取该文章的用户 一对一相对的关联
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
