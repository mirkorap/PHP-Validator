<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 13:09
 */

namespace Constraint;

class NotBlankConstraint extends BasicConstraint
{

    /**
     * NotBlankConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} non deve essere vuoto.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (!empty(trim($value))) {
            return true;
        }

        return $this->getMessage();
    }
}
