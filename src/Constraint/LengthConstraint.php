<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:13
 */

namespace PHPValidator\Constraint;

class LengthConstraint implements Constraint
{

    private $max;
    private $maxMessage;
    private $min;
    private $minMessage;

    /**
     * LengthConstraint constructor.
     * @param int $max
     * @param string $maxMessage
     * @param int $min
     * @param string $minMessage
     */
    public function __construct($max,
                                $maxMessage = 'Il campo {{ field }} deve avere al massimo {{ max }} caratteri.',
                                $min = 0,
                                $minMessage = 'Il campo {{ field }} deve avere almeno {{ min }} caratteri.')
    {
        $this->max = $max;
        $this->maxMessage = $maxMessage;
        $this->min = $min;
        $this->minMessage = $minMessage;
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
    public function getMaxMessage()
    {
        return str_replace('{{ max }}', $this->max, $this->maxMessage);
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return mixed|string
     */
    public function getMinMessage()
    {
        return str_replace('{{ min }}', $this->min, $this->minMessage);
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        $len = strlen($value);

        if ($len < $this->getMin()) {
            return $this->getMinMessage();
        }

        if ($len > $this->getMax()) {
            return $this->getMaxMessage();
        }

        return true;
    }
}
