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
        $type = $this->getType();

        switch ($type) {
            case 'string':
                return $this->isString($value);
            case 'numeric':
                return $this->isNumeric($value);
            case 'int':
            case 'integer':
                return $this->isInt($value);
            case 'float':
                return $this->isFloat($value);
            case 'double':
                return $this->isDouble($value);
            case 'bool':
            case 'boolean':
                return $this->isBool($value);
            case 'array':
                return $this->isArray($value);
            case 'object':
                return $this->isObject($value, $type);
        }

        return 'Il tipo di campo specificato non è supportato.';
    }

    private function isString($value)
    {
        return is_string($value) ?: $this->getMessage();
    }

    private function isNumeric($value)
    {
        return is_numeric($value) ?: $this->getMessage();
    }

    private function isInt($value)
    {
        return is_int($value) ?: $this->getMessage();
    }

    private function isFloat($value)
    {
        return is_float($value) ?: $this->getMessage();
    }

    private function isDouble($value)
    {
        return is_double($value) ?: $this->getMessage();
    }

    private function isBool($value)
    {
        return is_bool($value) ?: $this->getMessage();
    }

    private function isArray($value)
    {
        return is_array($value) ?: $this->getMessage();
    }

    private function isObject($value, $type)
    {
        return is_a($value, $type) ?: $this->getMessage();
    }
}
