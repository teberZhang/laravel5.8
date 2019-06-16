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
    /**
     * 获取所有视频的评论
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
