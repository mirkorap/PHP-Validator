<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:48
 */

namespace Constraint;

class NotIdenticalToConstraint extends ComparisonConstraint
{

    /**
     * NotIdenticalToConstraint constructor.
     * @param int $comparisonValue
     * @param string $message
     */
    public function __construct($comparisonValue,
                                $message = 'Il valore del campo {{ field }} non deve essere identico a {{ value }}.')
    {
        parent::__construct($comparisonValue, $message);
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($value !== $this->getComparisonValue()) {
            return true;
        }

        return $this->getMessage();
    }
}
