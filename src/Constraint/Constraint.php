<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 18/06/2018
 * Time: 12:49
 */

namespace PHPValidator\Constraint;

interface Constraint
{

    public function validate($value);
}
