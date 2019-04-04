<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\FloatValidator;

class FloatGreaterThanOrEqualTo implements FloatValidator
{
    /** @var float */
    private $floor;

    public function __construct (float $floor)
    {
        $this->floor = $floor;
    }

    public function validate (float $value): float
    {
        if (!$this->passes($value)) {
            throw ValidationFailed::forFloat($value, sprintf(
                'It was not greater than or equal to %s',
                $this->floor
            ));
        }

        return $value;
    }

    protected function passes (float $value): bool
    {
        return $value >= $this->floor;
    }
}
