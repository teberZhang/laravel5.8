<?php
namespace App\Http\Controllers\Design;

use App\DesignPatterns\Creational\AbstractFactory\HtmlFactory;
use App\DesignPatterns\Creational\AbstractFactory\JsonFactory;


/***
 * 设计模式系列 —— 抽象工厂模式（Abstract Factory）
 * Class AbstractFactoryTest
 * @package App\Http\Controllers\Design
 */
class AbstractFactoryTest
{
    public function test()
    {
        /***
         * HtmlFactory
         */
        $htmlFactory = new HtmlFactory();
        $htmlText = $htmlFactory
            ->createText('Html工厂创建text')
            ->render();
        $htmlPicture = $htmlFactory
            ->createPicture('http://local.laravel58.com/a.jpg', 'Html工厂创建picture')
            ->render();

        dump($htmlText);
        dump($htmlPicture);

        /***
         *JsonFactory
         */
        $jsonFactory = new JsonFactory();
        $htmlText = $jsonFactory
            ->createText('Json工厂创建text')
            ->render();
        $htmlPicture = $jsonFactory
            ->createPicture('http://local.laravel58.com/a.jpg', 'Json工厂创建picture')
            ->render();

        dump($htmlText);
        dump($htmlPicture);

    }
}