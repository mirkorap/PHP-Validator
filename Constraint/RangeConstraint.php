<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:40
 */

namespace Constraint;

class RangeConstraint implements Constraint
{

    private $min;
    private $max;
    private $minMessage;
    private $maxMessage;

    /**
     * RangeConstraint constructor.
     * @param int $min
     * @param int $max
     * @param string $minMessage
     * @param string $maxMessage
     */
    public function __construct($min,
                                $max,
                                $minMessage = 'Il valore del campo {{ field }} deve essere maggiore o uguale a {{ min }}.',
                                $maxMessage = 'Il valore del campo {{ field }} deve essere minore o uguale a {{ max }}.')
    {
        $this->min = $min;
        $this->max = $max;
        $this->minMessage = $minMessage;
        $this->maxMessage = $maxMessage;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @return mixed|string
     */
    public function getMinMessage()
    {
        return str_replace('{{ min }}', $this->min, $this->minMessage);
    }

    /**
     * @param string $minMessage
     */
    public function setMinMessage($minMessage)
    {
        $this->minMessage = $minMessage;
    }

    /**
     * @return mixed|string
     */
    public function getMaxMessage()
    {
        return str_replace('{{ max }}', $this->max, $this->maxMessage);
    }

    /**
     * @param string $maxMessage
     */
    public function setMaxMessage($maxMessage)
    {
        $this->maxMessage = $maxMessage;
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($value < $this->getMin()) {
            return $this->getMinMessage();
        }

        if ($value > $this->getMax()) {
            return $this->getMaxMessage();
        }

        return true;
    }
}
