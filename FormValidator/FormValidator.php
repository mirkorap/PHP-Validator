<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19/06/2018
 * Time: 16:21
 */

namespace FormValidator;

use FieldValidator\FieldValidator;

abstract class FormValidator
{

    private $fields = array();

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param FieldValidator $field
     */
    public function addField(FieldValidator $field)
    {
        $this->fields[] = $field;
    }

    /**
     * @param array $fields
     */
    public function setFields(array $fields)
    {
        foreach ($fields as $field) {
            $this->addField($field);
        }
    }

    /**
     * @return bool|string
     */
    public function validate()
    {
        $validation = true;

        /* @var FieldValidator $field */
        foreach ($this->getFields() as $field) {
            $validation = $field->validate();

            if ($validation !== true) {
                return $validation;
            }
        }

        return $validation;
    }

    abstract public function buildForm();
}
