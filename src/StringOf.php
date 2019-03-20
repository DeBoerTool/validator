<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\StringValidator;

class StringOf implements StringValidator
{
    /** @var string[] */
    private $items;

    public function __construct (string ...$items)
    {
        $this->items = $items;
    }

    public function validate (string $value): string
    {
        if (!in_array($value, $this->items)) {
            throw ValidationFailed::forString($value, sprintf(
                'It was not one of the expected values of %s',
                implode(', ', $this->items)
            ));
        }

        return $value;
    }
}
