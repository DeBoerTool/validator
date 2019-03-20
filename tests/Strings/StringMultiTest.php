<?php

namespace Dbt\Validator\Tests\Strings;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\StringMaxLength;
use Dbt\Validator\StringMulti;
use Dbt\Validator\StringOf;
use PHPUnit\Framework\TestCase;

class StringMultiTest extends TestCase
{
    /** @var array */
    private $strings = [
        'some string',
        'some other string'
    ];

    /** @var string */
    private $shouldPass = 'some other string';

    /** @var string */
    private $shouldFail = 'this should fail for multiple reasons';

    /** @test */
    public function passing ()
    {
        $validator = new StringMulti(
            new StringMaxLength(20),
            new StringOf(...$this->strings)
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

        $validator = new StringMulti(
            new StringMaxLength(20),
            new StringOf(...$this->strings)
        );

        $validator->validate($this->shouldFail);
    }
}
