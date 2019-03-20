<?php declare(strict_types=1);

namespace Dbt\Validator\Interfaces;

interface IntegerValidator
{
    /** @throws \Dbt\Validator\Exceptions\ValidationFailed */
    public function validate (int $value): int;
}
