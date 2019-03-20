<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Abstracts\Multi;
use Dbt\Validator\Interfaces\StringValidator;

class StringMulti extends Multi implements StringValidator
{
    public function __construct (StringValidator ...$validators)
    {
        $this->setValidators($validators);
    }

    public function validate (string $value): string
    {
        /** @var StringValidator $validator */
        foreach ($this->validators as $validator) {
            $value = $validator->validate($value);
        }

        return $value;
    }
}
