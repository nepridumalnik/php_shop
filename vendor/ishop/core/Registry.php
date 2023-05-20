<?php

namespace ishop;

class Registry
{
    use TSingleton;

    private static array $properties;

    public function __construct()
    {
        self::$properties = [];
    }

    public function setProperty(string $key, string $value): void
    {
        self::$properties[$key] = $value;
    }

    public function getProperty(string $key): string|null
    {
        if (isset(self::$properties[$key])) {
            return self::$properties[$key];
        }

        return null;
    }

    public function getProperties(): array
    {
        return self::$properties;
    }
}

?>