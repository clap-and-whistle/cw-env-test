<?php

declare(strict_types=1);

namespace Cw\EnvTest;

use PHPUnit\Framework\TestCase;

class UsingClassTest extends TestCase
{
    public function test(): void
    {
        $target = new UseIngClass();

        $this->assertEmpty($target->getArray());
    }
}