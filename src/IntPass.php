<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Interfaces\IntegerValidator;

class IntPass implements IntegerValidator
{
    public function validate (int $value): int
    {
        return $value;
    }
}
