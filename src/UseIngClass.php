<?php

declare(strict_types=1);

namespace Cw\EnvTest;

use stdClass;

class UseIngClass
{
    private readonly stdClass $object;

    public function __construct()
    {
        $this->object = new stdClass();
    }

    /**
     * @return array<string, mixed>
     */
    public function getArray(): array
    {
        return (array) $this->object;
    }
}