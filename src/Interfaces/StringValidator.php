<?php declare(strict_types=1);

namespace Dbt\Validator\Interfaces;

interface StringValidator
{
    /** @throws \Dbt\Validator\Exceptions\ValidationFailed */
    public function validate (string $value): string;
}
