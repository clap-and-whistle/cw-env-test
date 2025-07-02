<?php

declare(strict_types=1);

namespace Cw\EnvTest;

use Koriym\EnvJson\EnvJson;
use stdClass;

class UseIngClass
{
    private readonly stdClass $object;

    public function __construct()
    {
        $envJson = new EnvJson();
        $this->object = $envJson->load(dirname(__DIR__));
    }

    /**
     * @return array<string, mixed>
     */
    public function getArray(): array
    {
        return (array) $this->object;
    }

    public function hogeStr(): string
    {
        return $this->object->HOGE_STRING;
    }

    public function hogeInt(): int
    {
        return (int) $this->object->HOGE_INTEGER;
    }

    public function debugMode(): bool
    {
        return $this->object->DEBUG_MODE === 'true';
    }
}