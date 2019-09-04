<?php


namespace App\DesignPatterns\Structural\Adapter;

/***
 * Book 纸质书实现类
 * Class Book
 * @package App\DesignPatterns\Structural\Adapter
 */
class Book implements PaperBookInterface
{
    /***
     * 纸质书打开方法
     * @return mixed|string
     */
    public function open()
    {
        // TODO: Implement open() method.
        return '纸质书打开方法';
    }

    /***
     * 纸质书翻页方法
     * @return mixed|string
     */
    public function turnPage()
    {
        // TODO: Implement turnPage() method.
        return '纸质书翻页方法';
    }
}