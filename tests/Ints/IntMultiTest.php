<?php

namespace Dbt\Validator\Tests\Ints;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\IntMulti;
use Dbt\Validator\IntOf;
use Dbt\Validator\IntPass;
use PHPUnit\Framework\TestCase;

class IntMultiTest extends TestCase
{
    /** @var array */
    private $ints = [
        111,
        9182,
    ];

    /** @var string */
    private $shouldPass = 111;

    /** @var string */
    private $shouldFail = 1111;

    /** @test */
    public function passing ()
    {
        $validator = new IntMulti(
            new IntPass(),
            new IntOf(...$this->ints)
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

        $validator = new IntMulti(
            new IntPass(),
            new IntOf(...$this->ints)
        );

        $validator->validate($this->shouldFail);
    }
}
