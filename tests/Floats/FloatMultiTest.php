<?php

namespace Dbt\Validator\Tests\Floats;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\FloatMulti;
use Dbt\Validator\FloatOf;
use Dbt\Validator\FloatPass;
use PHPUnit\Framework\TestCase;

class FloatMultiTest extends TestCase
{
    /** @var array */
    private $floats = [
        1.11,
        91.82,
    ];

    /** @var string */
    private $shouldPass = 91.82;

    /** @var string */
    private $shouldFail = 777.777;

    /** @test */
    public function passing ()
    {
        $validator = new FloatMulti(
            new FloatPass(),
            new FloatOf(...$this->floats)
        );

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }

    /** @test */
    public function failing ()
    {
        $this->expectException(ValidationFailed::class);

        $validator = new FloatMulti(
            new FloatPass(),
            new FloatOf(...$this->floats)
        );

        $validator->validate($this->shouldFail);
    }
}
