<?php


namespace App\DesignPatterns\Structural\Adapter;

/***
 * 纸质书接口
 * Interface PaperBookInterface
 * @package App\DesignPatterns\Structural\Adapter
 */
interface PaperBookInterface
{
    /***
     * 翻页方法
     *
     * @return mixed
     */
    public function turnPage();

    /***
     * 打开书的方法
     *
     * @return mixed
     */
    public function open();
}