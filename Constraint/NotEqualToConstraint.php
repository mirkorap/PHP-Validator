<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:47
 */

namespace Constraint;

class NotEqualToConstraint extends ComparisonConstraint
{

    /**
     * NotEqualToConstraint constructor.
     * @param int $comparisonValue
     * @param string $message
     */
    public function __construct($comparisonValue,
                                $message = 'Il valore del campo {{ field }} non deve essere uguale a {{ value }}.')
    {
        parent::__construct($comparisonValue, $message);
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($value != $this->getComparisonValue()) {
            return true;
        }

        return $this->getMessage();
    }
}
