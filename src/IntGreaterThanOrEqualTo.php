<?php declare(strict_types=1);

namespace Dbt\Validator;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\IntegerValidator;

class IntGreaterThanOrEqualTo implements IntegerValidator
{
    /** @var int */
    private $floor;

    public function __construct (int $floor)
    {
        $this->floor = $floor;
    }

    public function validate (int $value): int
    {
        if (!$this->passes($value)) {
            throw ValidationFailed::forInteger($value, sprintf(
                'It was not greater than or equal to %s',
                $this->floor
            ));
        }

        return $value;
    }

    protected function passes (int $value): bool
    {
        return $value >= $this->floor;
    }
}
