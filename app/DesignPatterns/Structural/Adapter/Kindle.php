<?php


namespace App\DesignPatterns\Structural\Adapter;

/***
 * Kindle 是电子书实现类
 * Class Kindle
 * @package App\DesignPatterns\Structural\Adapter
 */
class Kindle implements EBookInterface
{
    /***
     * 打开电子书
     * @return mixed|string
     */
    public function pressStart()
    {
        // TODO: Implement pressStart() method.
        return '打开电子书';
    }

    /***
     * 电子书翻页
     * @return mixed|string
     */
    public function pressNext()
    {
        // TODO: Implement pressNext() method.
        return '电子书翻页';
    }
}