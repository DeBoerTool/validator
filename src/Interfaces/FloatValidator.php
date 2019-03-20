<?php declare(strict_types=1);

namespace Dbt\Validator\Interfaces;

interface FloatValidator
{
    /** @throws \Dbt\Validator\Exceptions\ValidationFailed */
    public function validate (float $value): float;
}
