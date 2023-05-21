<?php

namespace ishop;

class Router
{
    private static array $routes = [];
    private static array $route = [];

    public static function add(string $regex, array $route = []): void
    {
        self::$routes[$regex] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function dispatch($url): void
    {
        echo $url . ': ';
        if (self::matchRoute($url)) {
            echo 'Ok';
        } else {
            echo 'Not Ok';
        }
    }

    public static function matchRoute($url): bool
    {
        return true;
    }
}

?>