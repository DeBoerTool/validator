<?php

namespace Dbt\Validator;

use Dbt\Validator\Abstracts\Multi;
use Dbt\Validator\Interfaces\IntegerValidator;

class IntMulti extends Multi implements IntegerValidator
{
    public function __construct (IntegerValidator ...$validators)
    {
        $this->setValidators($validators);
    }

    public function validate (int $value): int
    {
        /** @var IntegerValidator $validator */
        foreach ($this->validators as $validator) {
            $value = $validator->validate($value);
        }

        return $value;
    }
}
