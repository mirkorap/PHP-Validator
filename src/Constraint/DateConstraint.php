<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:54
 */

namespace PHPValidator\Constraint;

class DateConstraint extends BasicConstraint
{

    /**
     * DateConstraint constructor.
     * @param string $message
     */
    public function __construct($message = 'Selezionare una data valida per il campo {{ field }}.')
    {
        parent::__construct($message);
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        if (is_date($value)) {
            return true;
        }

        return $this->getMessage();
    }
}
