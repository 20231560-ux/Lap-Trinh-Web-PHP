<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_POST['confirm_order'])) {
    header("Location: " . BASE_URL . "/Thanhtoan.php");
    exit;
}

if (empty($_SESSION['cart'])) {
    $_SESSION['cart_message'] = "Giỏ hàng đang trống.";
    header("Location: " . BASE_URL . "/Giohang.php");
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$address  = trim($_POST['address'] ?? '');
$note     = trim($_POST['note'] ?? '');
$payment  = $_POST['payment_method'] ?? 'cod';
$total    = (float)($_POST['total_amount'] ?? 0);

if ($fullname === '' || $phone === '' || $address === '') {
    $_SESSION['cart_message'] = "Vui lòng nhập đầy đủ thông tin nhận hàng.";
    header("Location: " . BASE_URL . "/Thanhtoan.php");
    exit;
}

// TODO: lưu đơn hàng vào database nếu cần

unset($_SESSION['cart']);

$_SESSION['cart_message'] = "✅ Đặt hàng thành công! Cảm ơn bạn đã mua hàng.";

header("Location: " . BASE_URL . "/Giohang.php");
exit;