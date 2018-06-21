<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 12:52
 */

namespace Constraint;

abstract class BasicConstraint implements Constraint
{

    private $message;

    /**
     * BasicConstraint constructor.
     * @param string $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
