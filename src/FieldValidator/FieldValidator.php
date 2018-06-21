<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19/06/2018
 * Time: 16:09
 */

namespace PHPValidator\FieldValidator;

use PHPValidator\Constraint\Constraint;

class FieldValidator
{

    private $name;
    private $label;
    private $value;
    private $constraints = array();

    /**
     * FieldValidator constructor.
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @param array $constraints
     */
    public function __construct($name, $label, $value, array $constraints)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->setConstraints($constraints);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * @param Constraint $constraint
     */
    public function addConstraint(Constraint $constraint)
    {
        $this->constraints[] = $constraint;
    }

    /**
     * @param array $constraints
     */
    public function setConstraints(array $constraints)
    {
        foreach ($constraints as $constraint) {
            $this->addConstraint($constraint);
        }
    }

    /**
     * @return bool|mixed
     */
    public function validate()
    {
        $validation = true;

        /* @var Constraint $constraint */
        foreach ($this->getConstraints() as $constraint) {
            $validation = $constraint->validate($this->getValue());

            if ($validation !== true) {
                return str_replace('{{ field }}', $this->getLabel(), $validation);
            }
        }

        return $validation;
    }

}
