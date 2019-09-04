<?php


namespace App\Http\Controllers\Design;
use App\DesignPatterns\Structural\Adapter\EBookAdapter;
use App\DesignPatterns\Structural\Adapter\Kindle;
use App\DesignPatterns\Structural\Adapter\Book;

/***
 * 设计模式系列 —— 适配器模式
 * Class AdapterTest
 * @package App\Http\Controllers\Design
 */
class AdapterTest
{
    public function test()
    {
        /***
         * 原始的接口
         */
        $book = new Book();
        dump($book->open());
        dump($book->turnPage());

        /***
         * 电子书适配器方法调用
         * 原始的接口和实现不动
         * 通过注入的方式 重写接口的实现方法
         */
        $eBookAdapter = new EBookAdapter(new Kindle());
        dump($eBookAdapter->open());
        dump($eBookAdapter->turnPage());
    }
}