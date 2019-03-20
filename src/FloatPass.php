<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Interfaces\FloatValidator;

class FloatPass implements FloatValidator
{
    public function validate (float $value): float
    {
        return $value;
    }
}
