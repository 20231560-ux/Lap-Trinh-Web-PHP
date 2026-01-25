<?php

require __DIR__ . '/../core/Database.php';
require __DIR__ . '/../core/Controller.php';
require __DIR__ . '/../core/Router.php';

$pdo = Database::connect();

Router::dispatch($pdo);
