<?php


namespace App\DesignPatterns\Behavioral\Strategy;


/***
 * Class IdComparator
 * @package App\DesignPatterns\Behavioral\Strategy
 */
class IdComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        // TODO: Implement compare() method.
        if ($a['id'] == $b['id']) {
            return 0;
        } else {
            return $a['id'] < $b['id'] ? -1 : 1;
        }
    }
}