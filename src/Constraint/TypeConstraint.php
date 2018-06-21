<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:07
 */

namespace PHPValidator\Constraint;

class TypeConstraint extends BasicConstraint
{

    private $type;

    /**
     * TypeConstraint constructor.
     * @param string $type
     * @param string $message
     */
    public function __construct($type, $message = 'Il valore del campo {{ field }} deve essere del tipo {{ type }}.')
    {
        $this->type = $type;
        parent::__construct($message);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return str_replace('{{ type }}', $this->type, parent::getMessage());
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        switch ($this->getType()) {
            case 'string':
                return is_string($value);
            case 'int':
            case 'integer':
                return is_int($value);
            case 'float':
                return is_float($value);
            case 'bool':
            case 'boolean':
                return is_bool($value);
            case 'array':
                return is_array($value);
            case 'object':
                return is_a($value, $this->getType());
        }

        return $this->getMessage();
    }
}
