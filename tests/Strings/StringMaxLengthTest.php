<?php

namespace Dbt\Validator\Tests\Strings;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\StringMaxLength;
use PHPUnit\Framework\TestCase;

class StringMaxLengthTest extends TestCase
{
    private $length = 20;

    /** @var string */
    private $shouldPass = 'some other string';

    /** @var string */
    private $shouldFail = 'this should fail because the string is too long';

    /** @test */
    public function passing ()
    {
        $validator = new StringMaxLength($this->length);

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }

    /** @test */
    public function failing ()
    {
        $this->expectException(ValidationFailed::class);

        $validator = new StringMaxLength($this->length);

        $validator->validate($this->shouldFail);
    }
}
