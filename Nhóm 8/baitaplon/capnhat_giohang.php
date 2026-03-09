<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$action = $_GET['action'] ?? '';
$id     = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0 || !isset($_SESSION['cart'][$id])) {
    header("Location: " . BASE_URL . "/giohang.php");
    exit;
}

switch ($action) {
    case 'tang':
        $_SESSION['cart'][$id]['soluong'] += 1;
        break;

    case 'giam':
        $_SESSION['cart'][$id]['soluong'] -= 1;

        if ($_SESSION['cart'][$id]['soluong'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
        break;

    case 'xoa':
        unset($_SESSION['cart'][$id]);
        break;
}

header("Location: " . BASE_URL . "/giohang.php");
exit;
?>