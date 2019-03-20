<?php

namespace Dbt\Validator\Tests\Floats;

use Dbt\Validator\FloatPass;
use PHPUnit\Framework\TestCase;

class FloatPassTest extends TestCase
{
    private $shouldPass = 1.2;

    /** @test */
    public function passing ()
    {
        $validator = new FloatPass();

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }
}
