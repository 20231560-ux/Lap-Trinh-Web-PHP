<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy ID sản phẩm từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: " . BASE_URL . "/Sanpham.php?error=invalid_id");
    exit;
}

// Lấy sản phẩm từ database
$sql = "SELECT MASACH, TENSACH, GIA, HINHANH 
        FROM sach 
        WHERE MASACH = $id 
        LIMIT 1";

$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    header("Location: " . BASE_URL . "/Sanpham.php?error=product_not_found");
    exit;
}

$sp = mysqli_fetch_assoc($result);

// Khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm hoặc tăng số lượng
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['soluong'] += 1;
} else {
    $_SESSION['cart'][$id] = [
        'id'      => (int)$sp['MASACH'],
        'ten'     => $sp['TENSACH'],
        'gia'     => (float)$sp['GIA'],
        'soluong' => 1,
        'hinhanh' => basename($sp['HINHANH'] ?? 'default-book.jpg')
    ];
}

// Thông báo
$_SESSION['cart_message'] = "Đã thêm <strong>" . htmlspecialchars($sp['TENSACH']) . "</strong> vào giỏ hàng!";

// Chuyển hướng sang giỏ hàng
header("Location: " . BASE_URL . "/giohang.php");
exit;