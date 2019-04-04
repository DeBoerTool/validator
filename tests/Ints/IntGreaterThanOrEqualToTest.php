<?php

namespace Dbt\Validator\Tests\Ints;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\IntegerValidator;
use Dbt\Validator\IntGreaterThanOrEqualTo;
use PHPUnit\Framework\TestCase;

class IntGreaterThanOrEqualToTest extends TestCase
{
    /**
     * @test
     * @dataProvider passingData
     */
    public function passing (IntegerValidator $validator, int $value)
    {
        $this->assertSame(
            $value,
            $validator->validate($value)
        );
    }

    /**
     * @test
     * @dataProvider failingData
     */
    public function failing (IntegerValidator $validator, int $value)
    {
        $this->expectException(ValidationFailed::class);

        $validator->validate($value);
    }


    public function passingData (): array
    {
        return [
            [
                new IntGreaterThanOrEqualTo(10),
                10,
            ],
            [
                new IntGreaterThanOrEqualTo(-100),
                -99
            ],
        ];
    }

    public function failingData ()
    {
        return [
            [
                new IntGreaterThanOrEqualTo(10),
                9,
            ],
            [
                new IntGreaterThanOrEqualTo(-99),
                -100
            ],
        ];
    }
}
