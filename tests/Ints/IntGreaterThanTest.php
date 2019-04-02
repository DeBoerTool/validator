<?php

namespace Dbt\Validator\Tests\Ints;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\Interfaces\IntegerValidator;
use Dbt\Validator\IntGreaterThan;
use Dbt\Validator\IntOf;
use PHPUnit\Framework\TestCase;

class IntGreaterThanTest extends TestCase
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
                new IntGreaterThan(10),
                11,
            ],
            [
                new IntGreaterThan(-100),
                -99
            ],
        ];
    }

    public function failingData ()
    {
        return [
            [
                new IntGreaterThan(10),
                10,
            ],
            [
                new IntGreaterThan(10),
                9
            ],
            [
                new IntGreaterThan(-99),
                -100
            ],
        ];
    }
}
