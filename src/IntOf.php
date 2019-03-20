<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\IntegerValidator;

class IntOf implements IntegerValidator
{
    /** @var int[] */
    private $items;

    public function __construct (int ...$items)
    {
        $this->items = $items;
    }

    public function validate (int $value): int
    {
        if (!in_array($value, $this->items)) {
            throw ValidationFailed::forInteger($value, sprintf(
                'It was not one of the expected values of %s',
                $this->itemsAsString()
            ));
        }

        return $value;
    }

    protected function itemsAsString (): string
    {
        return implode(', ', $this->items);
    }
}
