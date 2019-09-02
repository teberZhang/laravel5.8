<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DesignPatterns\Creational\AbstractFactory\AbstractFactory;
use App\DesignPatterns\Creational\AbstractFactory\HtmlFactory;
use App\DesignPatterns\Creational\AbstractFactory\JsonFactory;

/***
 * PHP 设计模式系列 —— 抽象工厂模式 —— 测试
 * Class AbstractFactoryTest
 * @package Tests\Unit
 */
class AbstractFactoryTest extends TestCase
{
    public function getFactories()
    {
        return array(
            array(new JsonFactory()),
            array(new HtmlFactory()),
        );
    }

    /**
     * 这里是工厂的客户端，我们无需关心传递过来的是什么工厂类，
     * 只需以我们想要的方式渲染任意想要的组件即可。
     *
     * @param AbstractFactory $factory
     * @dataProvider getFactories
     */
    public function testComponentCreation(AbstractFactory $factory)
    {
        $article = array(
            $factory->createText('Laravel学院'),
            $factory->createPicture('/image.jpg', 'laravel-academy'),
            $factory->createText('LaravelAcademy.org')
        );
        $this->assertContainsOnly('App\DesignPatterns\Creational\AbstractFactory\MediaInterface', $article);
    }
}
