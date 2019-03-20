<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\StringValidator;

class StringMaxLength implements StringValidator
{
    /** @var int */
    private $max;

    public function __construct (int $max)
    {
        $this->max = $max;
    }

    public function validate (string $value): string
    {
        if ($this->shouldValidate() && $this->failsValidation($value)) {
            throw ValidationFailed::forString($value, sprintf(
                'It exceeded the maximum of %s characters',
                $this->max
            ));
        }

        return $value;
    }

    private function failsValidation (string $value): bool
    {
        return strlen($value) > $this->max;
    }

    private function shouldValidate (): bool
    {
        return $this->max > 0;
    }
}
