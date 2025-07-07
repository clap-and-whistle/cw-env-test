<?php

declare(strict_types=1);

namespace Cw\EnvTest;

use PHPUnit\Framework\TestCase;

class UsingClassTest extends TestCase
{
    public function testOeverride(): void
    {
        $using = new UseIngClass();
        $target = $using->getArray();

        $this->assertArrayHasKey('HOGE_INTEGER', $target);
        $this->assertIsString($target['HOGE_INTEGER']);
        $this->assertSame(
            expected: 2025,
            actual: $using->hogeInt(),
        );

        $this->assertArrayHasKey('DEBUG_MODE', $target);
        $this->assertIsString($target['DEBUG_MODE']);
        $this->assertFalse($using->debugMode());

        $this->assertArrayHasKey('HOGE_STRING', $target);
        $this->assertSame(
            expected: 'hogefuga',
            actual: $using->hogeStr(),
        );
    }
}