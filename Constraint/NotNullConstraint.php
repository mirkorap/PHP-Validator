<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 13:14
 */

namespace Constraint;

class NotNullConstraint extends BasicConstraint
{

    /**
     * NotNullConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} non deve essere nullo.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (!is_null($value)) {
            return true;
        }

        return $this->getMessage();
    }
}
