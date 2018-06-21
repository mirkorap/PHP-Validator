<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:51
 */

namespace PHPValidator\Constraint;

class GreaterThanOrEqualConstraint extends ComparisonConstraint
{

    /**
     * GreaterThanOrEqualConstraint constructor.
     * @param int $comparisonValue
     * @param string $message
     */
    public function __construct($comparisonValue,
                                $message = 'Il valore del campo {{ field }} deve essere maggiore o uguale a {{ value }}.')
    {
        parent::__construct($comparisonValue, $message);
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($value >= $this->getComparisonValue()) {
            return true;
        }

        return $this->getMessage();
    }
}
