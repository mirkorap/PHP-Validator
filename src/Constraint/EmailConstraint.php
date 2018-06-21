<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:09
 */

namespace PHPValidator\Constraint;

class EmailConstraint extends BasicConstraint
{

    /**
     * EmailConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Inserire un indirizzo email valido.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return $this->getMessage();
    }
}
