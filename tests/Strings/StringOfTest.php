<?php

namespace Dbt\Validator\Tests\Strings;

use Dbt\Validator\Exceptions\ValidationFailed;
use Dbt\Validator\StringOf;
use PHPUnit\Framework\TestCase;

class StringOfTest extends TestCase
{
    /** @var array */
    private $strings = [
        'some string',
        'some other string'
    ];

    /** @var string */
    private $shouldPass = 'some other string';

    /** @var string */
    private $shouldFail = 'this should fail';

    /** @test */
    public function passing ()
    {
        $validator = new StringOf(...$this->strings);

        $this->assertSame(
            $this->shouldPass,
            $validator->validate($this->shouldPass)
        );
    }

    /** @test */
    public function failing ()
    {
        $this->expectException(ValidationFailed::class);

        $validator = new StringOf(...$this->strings);

        $validator->validate($this->shouldFail);
    }
}
