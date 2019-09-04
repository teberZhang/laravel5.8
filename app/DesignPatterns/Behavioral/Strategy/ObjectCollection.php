<?php


namespace App\DesignPatterns\Behavioral\Strategy;

/***
 * Class ObjectCollection
 * @package App\DesignPatterns\Behavioral\Strategy
 */
class ObjectCollection
{
    /***
     * @var array
     */
    private $elements;

    /***
     * @var ComparatorInterface
     */
    private $comparator;

    /***
     * ObjectCollection constructor.
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    /***
     * @return array
     */
    public function sort()
    {
        if (!$this->comparator) {
            throw new \LogicException('Comparator is not set');
        }

        $callback = array($this->comparator, 'compare');
        uasort($this->elements, $callback);

        return $this->elements;
    }

    public function setComparator(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }
}