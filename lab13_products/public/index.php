<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../app/controllers/ApiProductController.php';

$uri = strtolower($_SERVER['REQUEST_URI']);

$api = new ApiProductController($pdo);

// API search
if (strpos($uri, '/api/products/search') !== false) {
    $api->search();
    exit;
}

// API delete
if (strpos($uri, '/api/products/delete') !== false) {
    $api->delete();
    exit;
}

// Default: load view
require_once __DIR__ . '/../app/views/products.php';
