<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:59
 */

namespace Constraint;

class DatetimeConstraint extends DateConstraint
{

    private $format;
    private $epoch;

    /**
     * DatetimeConstraint constructor.
     * @param string $format
     * @param string $message
     */
    public function __construct($format, $message = 'Selezionare una data valida per il campo {{ field }}.')
    {
        $this->format = $format;
        $this->epoch = new Epoch();
        parent::__construct($message);
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        $convertDate = $this->epoch->convertDate($value, $this->getFormat(), 'Y-m-d');

        return parent::validate($convertDate);
    }
}
