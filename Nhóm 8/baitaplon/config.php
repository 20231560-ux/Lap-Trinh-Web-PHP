<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Đường dẫn vật lý
define('BASE_PATH', __DIR__);

// Đường dẫn URL
define('BASE_URL', '/lab04/baitaplon');

// Kết nối database
$conn = mysqli_connect('localhost', 'root', '', 'webbansach');

if (!$conn) {
    die("Kết nối DB thất bại: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

// Debug
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>