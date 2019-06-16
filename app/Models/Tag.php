<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * 获取所有分配该标签的文章
     */
    public function articles()
    {
        return $this->morphedByMany('App\Models\Article', 'taggable');
    }

    /**
     * 获取分配该标签的所有视频
     */
    public function videos()
    {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
