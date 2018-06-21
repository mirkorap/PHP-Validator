<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 13:11
 */

namespace Constraint;

class NullConstraint extends BasicConstraint
{

    /**
     * NullConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Il valore del campo {{ field }} deve essere nullo.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (is_null($value)) {
            return true;
        }

        return $this->getMessage();
    }
}
