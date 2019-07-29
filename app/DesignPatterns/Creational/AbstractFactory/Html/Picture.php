<?php
namespace App\DesignPatterns\Creational\AbstractFactory\Html;

use App\DesignPatterns\Creational\AbstractFactory\Picture as BasePicture;

/**
 * Picture 类
 *
 * 该类是以 HTML 格式渲染的具体图片类
 */
class Picture extends BasePicture
{
    /**
     * HTML 格式输出的图片
     *
     * @return string
     */
    public function render()
    {
        return sprintf('<img src="%s" title="%s"/>', $this->path, $this->name);
    }
}