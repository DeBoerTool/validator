<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Abstracts\Multi;
use Dbt\Validator\Interfaces\FloatValidator;

class FloatMulti extends Multi implements FloatValidator
{
    public function __construct (FloatValidator ...$validators)
    {
        $this->setValidators($validators);
    }

    public function validate (float $value): float
    {
        /** @var FloatValidator $validator */
        foreach ($this->validators as $validator) {
            $value = $validator->validate($value);
        }

        return $value;
    }
}
