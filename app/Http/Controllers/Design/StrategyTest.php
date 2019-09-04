<?php


namespace App\Http\Controllers\Design;

use App\DesignPatterns\Behavioral\Strategy\DateComparator;
use App\DesignPatterns\Behavioral\Strategy\IdComparator;
use App\DesignPatterns\Behavioral\Strategy\ObjectCollection;

/***
 * PHP 设计模式系列 —— 策略模式(又叫算法簇模式)
 *
 * Class StrategyTest
 * @package App\Http\Controllers\Design
 */
class StrategyTest
{
    public function test()
    {
        /***
         * ID数值比较
         */
        $collection = array(
            array('id' => 2),
            array('id' => 1),
            array('id' => 3),
            array('id' => 5),
            array('id' => 4)
        );
        $objectCollection = new ObjectCollection($collection);
        $objectCollection->setComparator(new IdComparator());
        $elements = $objectCollection->sort();
        dump($elements);

        /***
         * 日期比较
         */
        $collection = array(
            array('date' => '2014-03-03'),
            array('date' => '2015-03-02'),
            array('date' => '2013-03-01'),
            array('date' => '2019-09-05'),
            array('date' => '2019-09-02')
        );
        $objectCollection = new ObjectCollection($collection);
        $objectCollection->setComparator(new DateComparator());
        $elements = $objectCollection->sort();
        dump($elements);
    }
}