<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 15:36
 */

namespace Constraint;

class RegexConstraint extends BasicConstraint
{

    private $pattern;
    private $match;

    /**
     * RegexConstraint constructor.
     * @param string $pattern
     * @param bool $match
     * @param string $message
     */
    public function __construct($pattern, $match = true, $message = 'Il valore del campo {{ field }} non è valido.')
    {
        $this->pattern = $pattern;
        $this->match = $match;
        parent::__construct($message);
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @return bool
     */
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * @param mixed $value
     * @return bool|string
     */
    public function validate($value)
    {
        $match = (int)$this->getMatch();
        if (preg_match($this->getPattern(), $value) === $match) {
            return true;
        }

        return $this->getMessage();
    }
}
