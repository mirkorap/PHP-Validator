<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 13:19
 */

namespace PHPValidator\Constraint;

class IsTrueConstraint extends BasicConstraint
{

    /**
     * IsTrueConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} deve essere true.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if ($value === true) {
            return true;
        }

        return $this->getMessage();
    }
}
