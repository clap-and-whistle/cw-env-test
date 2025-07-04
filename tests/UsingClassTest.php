<?php

declare(strict_types=1);

namespace Cw\EnvTest;

use PHPUnit\Framework\TestCase;

class UsingClassTest extends TestCase
{
    public function test(): void
    {
        $using = new UseIngClass();
        $target = $using->getArray();

        $this->assertArrayHasKey('HOGE_INTEGER', $target);
        $this->assertIsString($target['HOGE_INTEGER']);
        $this->assertSame(
            expected: 2025,
            actual: $using->hogeInt(),
            message: 'env.json で定義した値で上書きできていない',
        );

        $this->assertArrayHasKey('DEBUG_MODE', $target);
        $this->assertIsString($target['DEBUG_MODE']);
        $this->assertFalse($using->debugMode());

        $this->assertArrayHasKey('HOGE_STRING', $target);
        $this->assertSame(
            expected: 'hogehoge',
            actual: $using->hogeStr(),
        );
    }
}