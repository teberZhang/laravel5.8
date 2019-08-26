<?php

namespace App\Policies;

use App\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

/***
 * Policy 方法
 * --model 会自动创建view、create等方法
 * php artisan make:policy ArticlePolicy --model=Models\Article
 * Class ArticlePolicy
 * @package App\Policies
 */
class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * 确定用户是否可以查看文章.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        //
    }

    /**
     * 确定用户是否可以创建文章.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 10;
    }

    /**
     * 确定用户是否可以更新文章.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * 判断给定文章是否可以被用户更新.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        //
    }

    /**
     * 确定用户是否可以还原文章.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * 确定用户是否可以永久删除文章.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }

    /***
     * 策略过滤器 率先执行
     * @param $user
     * @param $ability
     * @return bool
     */
    /*public function before($user, $ability)
    {
        return false;
    }*/
}
