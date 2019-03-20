<?php declare(strict_types=1);

namespace Dbt\Validator\Exceptions;

use Exception;

class ValidationFailed extends Exception
{
    public static function forString (string $string, string $reason): self
    {
        return new self(sprintf(
            'Validation failed for string "%s". %s',
            $string,
            $reason
        ));
    }

    public static function forInteger (int $int, string $reason): self
    {
        return new self(sprintf(
            'Validation failed for integer "%s". %s',
            $int,
            $reason
        ));
    }

    public static function forFloat (float $float, string $reason): self
    {
        return new self(sprintf(
            'Validation failed for float "%s". %s',
            $float,
            $reason
        ));
    }
}
