<?php
require __DIR__ . "/../config.php";

$thongbao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tensach = trim($_POST['tensach'] ?? '');
    $tacgia  = trim($_POST['tacgia'] ?? '');
    $gia     = (float)($_POST['gia'] ?? 0);
    $hinhanh = trim($_POST['hinhanh'] ?? '');

    if ($tensach !== '' && $tacgia !== '') {
        $tensach = mysqli_real_escape_string($conn, $tensach);
        $tacgia  = mysqli_real_escape_string($conn, $tacgia);
        $hinhanh = mysqli_real_escape_string($conn, $hinhanh);

        $sql = "INSERT INTO sach (TENSACH, TACGIA, GIA, HINHANH)
                VALUES ('$tensach', '$tacgia', '$gia', '$hinhanh')";

        if (mysqli_query($conn, $sql)) {
            header("Location: " . BASE_URL . "/Admin/danhsach.php");
            exit;
        } else {
            $thongbao = "Lỗi thêm: " . mysqli_error($conn);
        }
    } else {
        $thongbao = "Vui lòng nhập đầy đủ thông tin";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sách</title>
    <style>
        body{font-family:Arial;background:#f5f5f5;padding:20px}
        .wrap{max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:12px}
        input{width:100%;padding:10px;margin-bottom:12px}
        button{padding:10px 18px;background:#198754;color:#fff;border:none;border-radius:8px;font-weight:bold}
        .msg{color:red;margin-bottom:10px}
    </style>
</head>
<body>
<div class="wrap">
    <h2>Thêm sách</h2>

    <?php if ($thongbao): ?>
        <p class="msg"><?= htmlspecialchars($thongbao) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="tensach" placeholder="Tên sách" required>
        <input type="text" name="tacgia" placeholder="Tác giả" required>
        <input type="number" name="gia" placeholder="Giá" min="0" required>
        <input type="text" name="hinhanh" placeholder="Tên file ảnh, ví dụ: sach1.jpg">
        <button type="submit">Lưu</button>
    </form>
</div>
</body>
</html>