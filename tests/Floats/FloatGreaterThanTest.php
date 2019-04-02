<?php

namespace Dbt\Validator\Tests\Floats;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\FloatGreaterThan;
use Dbt\Validator\Interfaces\FloatValidator;
use PHPUnit\Framework\TestCase;

class FloatGreaterThanTest extends TestCase
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
                new FloatGreaterThan(9.99999998),
                9.999999999999,
            ],
            [
                new FloatGreaterThan(-100.1),
                -100
            ],
        ];
    }

    public function failingData ()
    {
        return [
            [
                new FloatGreaterThan(10.0000001),
                10.0000001,
            ],
            [
                new FloatGreaterThan(10.0),
                9.0
            ],
            [
                new FloatGreaterThan(-99.0),
                -99.1
            ],
        ];
    }
}
