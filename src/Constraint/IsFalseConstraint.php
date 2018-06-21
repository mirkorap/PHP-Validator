<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 13:19
 */

namespace PHPValidator\Constraint;

class IsFalseConstraint extends BasicConstraint
{

    /**
     * IsFalseConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} deve essere false.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if ($value === false) {
            return true;
        }

        return $this->getMessage();
    }
}
