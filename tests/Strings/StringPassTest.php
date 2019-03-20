<?php

namespace Dbt\Validator\Tests\Strings;

use Dbt\Validator\StringPass;
use PHPUnit\Framework\TestCase;

class StringPassTest extends TestCase
{
    /** @test */
    public function passing ()
    {
        $string = 'some string';

        $validator = new StringPass();

        $this->assertSame($string, $validator->validate($string));
    }
}
