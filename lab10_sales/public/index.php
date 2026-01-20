<?php

$pdo = require __DIR__ . '/../app/config/db.php';

// Load base Controller class
require_once __DIR__ . '/../app/core/Controller.php';

$controllerName = $_GET['controller'] ?? 'products';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controllerName) . 'Controller';
$controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    die("Controller không tồn tại: $controllerName");
}

require_once $controllerFile;

$controller = new $controllerName($pdo);

if (!method_exists($controller, $action)) {
    die("Action không tồn tại: $action");
}

$controller->$action();
