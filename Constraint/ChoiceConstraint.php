<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 16:38
 */

namespace Constraint;

class ChoiceConstraint implements Constraint
{

    private $choices;
    private $callback;
    private $multiple;
    private $min;
    private $max;
    private $message;
    private $multipleMessage;
    private $minMessage;
    private $maxMessage;
    private $strict;

    /**
     * ChoiceConstraint constructor.
     * @param array $choices
     * @param string|array|Closure|null $callback
     */
    public function __construct($choices = array(), $callback = null)
    {
        $this->choices = $choices;
        if (!empty($callback)) {
            $this->choices = call_user_func($callback);
        }

        $this->callback = $callback;
        $this->multiple = false;
        $this->min = 0;
        $this->max = 9999;
        $this->message = 'Selezionare un valore valido per il campo {{ field }}.';
        $this->multipleMessage = 'Uno o più valori selezionati per il campo {{ field }} non sono validi.';
        $this->minMessage = 'Devi selezionare almeno {{ min }} valori per il campo {{ field }}.';
        $this->maxMessage = 'Devi selezionare al massimo {{ max }} valori per il campo {{ field }}.';
        $this->strict = false;
    }

    /**
     * @return array
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * @param mixed $choice
     */
    public function addChoice($choice)
    {
        $this->choices[] = $choice;
    }

    /**
     * @param array $choices
     */
    public function setChoices(array $choices)
    {
        $this->choices = $choices;
    }

    /**
     * @return string|array|Closure|null
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param string|array|Closure|null $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return bool
     */
    public function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param bool $multiple
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMultipleMessage()
    {
        return $this->multipleMessage;
    }

    /**
     * @param string $multipleMessage
     */
    public function setMultipleMessage($multipleMessage)
    {
        $this->multipleMessage = $multipleMessage;
    }

    /**
     * @return mixed
     */
    public function getMinMessage()
    {
        return str_replace('{{ min }}', $this->min, $this->minMessage);
    }

    /**
     * @param string $minMessage
     */
    public function setMinMessage($minMessage)
    {
        $this->minMessage = $minMessage;
    }

    /**
     * @return mixed
     */
    public function getMaxMessage()
    {
        return str_replace('{{ max }}', $this->max, $this->maxMessage);
    }

    /**
     * @param string $maxMessage
     */
    public function setMaxMessage($maxMessage)
    {
        $this->maxMessage = $maxMessage;
    }

    /**
     * @return bool
     */
    public function isStrict()
    {
        return $this->strict;
    }

    /**
     * @param bool $strict
     */
    public function setStrict($strict)
    {
        $this->strict = $strict;
    }

    /**
     * @param mixed $value
     * @return bool|mixed|string
     */
    public function validate($value)
    {
        if ($this->isMultiple()) {
            return $this->validateMultipleValues($value);
        }

        if (!$this->isValueInChoices($value)) {
            return $this->getMessage();
        }

        return true;
    }

    /**
     * @param array $values
     * @return bool|mixed|string
     */
    public function validateMultipleValues(array $values)
    {
        if (count($values) < $this->getMin()) {
            return $this->getMinMessage();
        }

        if (count($values) > $this->getMax()) {
            return $this->getMaxMessage();
        }

        foreach ($values as $value) {
            if (!$this->isValueInChoices($value)) {
                return $this->getMultipleMessage();
            }
        }

        return true;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    private function isValueInChoices($value)
    {
        return in_array($value, $this->getChoices(), $this->isStrict());
    }

}
