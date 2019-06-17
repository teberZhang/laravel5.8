<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 视频表 videos
 * Class Video
 * @package App
 */
class Video extends Model
{
    const TABLE = 'videos';

    protected $table = self::TABLE;

    /**
     * 获取所有视频的评论(多态一对多)
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    /**
     * 获取指定视频所有标签(多态多对多)
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
