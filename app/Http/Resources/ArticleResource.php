<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/***
 * 文章资源类
 * Class ArticleResource
 * @package App\Http\Resources
 */
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
