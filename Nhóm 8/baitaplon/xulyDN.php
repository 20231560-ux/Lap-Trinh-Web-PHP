<?php
require __DIR__ . "/config.php";
require __DIR__ . "/db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    $_SESSION['login_error'] = "Vui lòng nhập đầy đủ tài khoản và mật khẩu";
    header("Location: " . BASE_URL . "/Dangnhap.php");
    exit();
}

$sql = "SELECT * FROM nguoidung WHERE TENDN = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $password === $user['MK']) {
    $_SESSION['user'] = $user['TENDN'];
    $_SESSION['hoten'] = $user['HOTEN'];

    header("Location: " . BASE_URL . "/Trangchu.php");
    exit();
} else {
    $_SESSION['login_error'] = "Sai tài khoản hoặc mật khẩu";
    header("Location: " . BASE_URL . "/Dangnhap.php");
    exit();
}