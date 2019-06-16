<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/***
 * 评论表 comments
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    protected $fillable = ['body'];

    /***
     * @desc 获取所有拥有的可评论模型。(多态一对多)
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
