<?php

namespace Dbt\Validator\Tests\Ints;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\IntOf;
use PHPUnit\Framework\TestCase;

class IntOfTest extends TestCase
{
    /** @var array */
    private $ints = [
        111,
        9182,
    ];

    /** @var string */
    private $shouldPass = 9182;

    /** @var string */
    private $shouldFail = 777;

    /** @test */
    public function passing ()
    {
        $validator = new IntOf(...$this->ints);

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }

    /** @test */
    public function failing ()
    {
        $this->expectException(ValidationFailed::class);

        $validator = new IntOf(...$this->ints);

        $validator->validate($this->shouldFail);
    }
}
