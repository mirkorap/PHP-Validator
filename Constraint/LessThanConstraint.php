<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:49
 */

namespace Constraint;

class LessThanConstraint extends ComparisonConstraint
{

    /**
     * LessThanConstraint constructor.
     * @param int $comparisonValue
     * @param string $message
     */
    public function __construct($comparisonValue,
                                $message = 'Il valore del campo {{ field }} deve essere minore di {{ value }}.')
    {
        parent::__construct($comparisonValue, $message);
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($value < $this->getComparisonValue()) {
            return true;
        }

        return $this->getMessage();
    }
}
