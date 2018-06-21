<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:45
 */

namespace Constraint;

abstract class ComparisonConstraint extends BasicConstraint
{

    private $comparisonValue;

    /**
     * ComparisonConstraint constructor.
     * @param int $comparisonValue
     * @param string $message
     */
    public function __construct($comparisonValue, $message)
    {
        $this->comparisonValue = $comparisonValue;
        parent::__construct($message);
    }

    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return str_replace('{{ value }}', $this->comparisonValue, parent::getMessage());
    }

    /**
     * @return int
     */
    public function getComparisonValue()
    {
        return $this->comparisonValue;
    }
}
