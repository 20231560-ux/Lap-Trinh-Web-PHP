<?php

class Router {
    public static function dispatch($pdo) {
        $c = $_GET['c'] ?? 'category';
        $a = $_GET['a'] ?? 'index';

        $controllerName = ucfirst($c) . 'Controller';
        $file = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

        if (!file_exists($file)) {
            die('404 Controller not found');
        }

        require $file;

        $controller = new $controllerName($pdo);

        if (!method_exists($controller, $a)) {
            die('404 Action not found');
        }

        $controller->$a();
    }
}
