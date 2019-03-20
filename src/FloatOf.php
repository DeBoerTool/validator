<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\FloatValidator;

class FloatOf implements FloatValidator
{
    /** @var float[] */
    private $items;

    public function __construct (float ...$items)
    {
        $this->items = $items;
    }

    public function validate (float $value): float
    {
        if (!$this->passes($value)) {
            throw ValidationFailed::forFloat($value, $this->reason());
        }

        return $value;
    }

    protected function passes (float $value): bool
    {
        return in_array($value, $this->items);
    }

    protected function reason (): string
    {
        return sprintf(
            'It was not one of the expected values of %s',
            $this->itemsAsString()
        );
    }

    protected function itemsAsString (): string
    {
        return implode(', ', $this->items);
    }
}
