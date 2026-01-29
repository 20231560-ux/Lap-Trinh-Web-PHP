<?php
$config = require __DIR__.'/config.local.php';

session_start();

try {
  $db = $config['db'];
  $pdo = new PDO(
    "mysql:host={$db['host']};dbname={$db['name']};charset=utf8mb4",
    $db['user'],
    $db['pass'],
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $e) {
  error_log(date('[Y-m-d H:i:s] ') . $e->getMessage() . "\n", 3, __DIR__.'/../storage/logs/app.log');
  die("DB Error – xem log");
}

function set_flash($key, $msg) {
  $_SESSION['flash'][$key] = $msg;
}

function get_flash($key) {
  if (isset($_SESSION['flash'][$key])) {
    $msg = $_SESSION['flash'][$key];
    unset($_SESSION['flash'][$key]);
    return $msg;
  }
  return null;
}
