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
        $this->assertSame(2035, $using->hogeInt());

        $this->assertArrayHasKey('DEBUG_MODE', $target);
        $this->assertIsString($target['DEBUG_MODE']);
        $this->assertFalse($using->debugMode());

        $this->assertArrayHasKey('HOGE_STRING', $target);
        $this->assertSame(
            expected: 'hogefuga',   // env.json で定義した値
            actual: $using->hogeStr(),
            message: 'env.json で定義した値で上書きできていない'
        );
    }
}