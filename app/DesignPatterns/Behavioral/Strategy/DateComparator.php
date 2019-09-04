<?php


namespace App\DesignPatterns\Behavioral\Strategy;


/***
 * Class DateComparator
 * @package App\DesignPatterns\Behavioral\Strategy
 */
class DateComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        // TODO: Implement compare() method.
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);

        if ($aDate == $bDate) {
            return 0;
        } else {
            return $aDate < $bDate ? -1 : 1;
        }
    }
}