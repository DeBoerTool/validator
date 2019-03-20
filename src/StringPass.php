<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Interfaces\StringValidator;

class StringPass implements StringValidator
{
    public function validate (string $value): string
    {
        return $value;
    }
}
