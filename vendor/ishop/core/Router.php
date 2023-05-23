<?php

namespace ishop;

/**
 * Summary of Router
 */
class Router
{
    private static array $routes = [];

    public static function add(string $regex, array $route = []): void
    {
        self::$routes[$regex] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function dispatch($url): void
    {
        self::removeQueryStr($url);

        if (self::matchRoute($url, $route)) {
            $controller = 'app\\controllers\\' .
                $route['prefix'] .
                $route['controller'] .
                'Controller';

            if (class_exists($controller)) {
                $controllerObject = new $controller($route);
                $action = $route['action'] . 'Action';

                if (
                    method_exists($controllerObject, $action) &&
                    is_callable(array($controllerObject, $action))
                ) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception('Метод ' . $controller . '::' . $action . ' не найден', 404);
                }
            } else {
                throw new \Exception('Контроллер ' . $controller . ' не найден', 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    /**
     * Вырезает параметры из пути
     * @param string $url Путь
     * @return void
     */
    private static function removeQueryStr(string &$url): void
    {
        if ($url) {
            $params = explode('?', $url, 2);

            if (strpos($params[0], '=') === false) {
                $url = $params[0];
            } else {
                $url = '';
            }
        }
    }

    public static function matchRoute($url, &$route): bool
    {
        $route = array();

        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {

                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }

                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (empty($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = ucfirst($route['controller']);
                $route['action'] = lcfirst($route['action']);

                return true;
            }
        }

        return false;
    }
}

?>