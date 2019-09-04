<?php


namespace App\DesignPatterns\Behavioral\Strategy;

/***
 * ComparatorInterface类
 * Interface ComparatorInterface
 * @package App\DesignPatterns\Behavioral\Strategy
 */
interface ComparatorInterface
{
    /***
     * @param $a
     * @param $b
     * @return bool
     */
    public function compare($a, $b);
}