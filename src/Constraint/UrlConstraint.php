<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:12
 */

namespace PHPValidator\Constraint;

class UrlConstraint extends BasicConstraint
{

    /**
     * UrlConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} non è un valido URL.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return true;
        }

        return $this->getMessage();
    }
}
