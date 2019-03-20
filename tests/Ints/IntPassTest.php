<?php

namespace Dbt\Validator\Tests\Ints;

use Dbt\Validator\IntPass;
use PHPUnit\Framework\TestCase;

class IntPassTest extends TestCase
{
    private $shouldPass = 1;

    /** @test */
    public function passing ()
    {
        $validator = new IntPass();

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }
}
