<?php namespace System;

/**
 *
 */
class Kernel {

    const MODELS_PATH = __DIR__."/../models/";

    const CONTROLLERS_PATH = __DIR__."/../controllers/";

    const NOT_FOUND_PAGE = __DIR__."/../404.php";

    const CONTROLLER_NAMESPACE = "Controller\\";

    static function route()
    {
        $routeParts = explode("/", $_SERVER["REQUEST_URI"]);
        $controllerName = "Main";
        $action = "index";

        if (! empty($routeParts[1])) {
            $controllerName = strval($routeParts[1]);
            $controllerName = ucfirst(strtolower($controllerName));
        }

        if (! empty($routeParts[2])) {
            $action = strval($routeParts[2]);
        }

        $controllerPath = self::CONTROLLERS_PATH.strtolower($controllerName).".php";

        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            self::route_404();

            return;
        }

        $controllerName = self::CONTROLLER_NAMESPACE.$controllerName;
        $controller = new $controllerName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            self::route_404();

            return;
        }
    }

    static function route_404()
    {
        include(self::NOT_FOUND_PAGE);
    }
}