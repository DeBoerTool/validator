<?php

namespace Dbt\Validator\Tests\Floats;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\FloatGreaterThan;
use Dbt\Validator\FloatGreaterThanOrEqualTo;
use Dbt\Validator\Interfaces\FloatValidator;
use PHPUnit\Framework\TestCase;

class FloatGreaterThanOrEqualToTest extends TestCase
{
    /**
     * @test
     * @dataProvider passingData
     */
    public function passing (FloatValidator $validator, float $value)
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
    public function failing (FloatValidator $validator, float $value)
    {
        $this->expectException(ValidationFailed::class);

        $validator->validate($value);
    }


    public function passingData (): array
    {
        return [
            [
                new FloatGreaterThanOrEqualTo(9.99999998),
                9.99999998,
            ],
            [
                new FloatGreaterThanOrEqualTo(-100.1),
                -100
            ],
        ];
    }

    public function failingData ()
    {
        return [
            [
                new FloatGreaterThanOrEqualTo(10.0000001),
                10,
            ],
            [
                new FloatGreaterThanOrEqualTo(10.0),
                9.0
            ],
            [
                new FloatGreaterThanOrEqualTo(-99.0),
                -99.1
            ],
        ];
    }
}
