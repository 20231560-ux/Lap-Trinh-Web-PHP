<?php

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/BaseController.php';
require_once __DIR__ . '/../app/controllers/StudentController.php';

$a = $_GET['a'] ?? '';

$controller = new StudentController();

if ($a === 'api') {
    $controller->api();
} else {
    $controller->index();
}
