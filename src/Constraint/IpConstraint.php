<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:35
 */

namespace PHPValidator\Constraint;

class IpConstraint extends BasicConstraint
{

    /**
     * IpConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Inserire un indirizzo IP valido.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (filter_var($value, FILTER_VALIDATE_IP)) {
            return true;
        }

        return $this->getMessage();
    }
}
