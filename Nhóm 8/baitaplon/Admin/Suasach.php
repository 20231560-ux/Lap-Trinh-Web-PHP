<?php
require __DIR__ . "/../config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("ID không hợp lệ");
}

$sql = "SELECT * FROM sach WHERE MASACH = $id LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Không tìm thấy sách");
}

$row = mysqli_fetch_assoc($result);
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

        $sql_update = "UPDATE sach 
                       SET TENSACH='$tensach', TACGIA='$tacgia', GIA='$gia', HINHANH='$hinhanh'
                       WHERE MASACH=$id";

        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . BASE_URL . "/Admin/danhsach.php");
            exit;
        } else {
            $thongbao = "Lỗi cập nhật: " . mysqli_error($conn);
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
    <title>Sửa sách</title>
    <style>
        body{font-family:Arial;background:#f5f5f5;padding:20px}
        .wrap{max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:12px}
        input{width:100%;padding:10px;margin-bottom:12px}
        button{padding:10px 18px;background:#0d6efd;color:#fff;border:none;border-radius:8px;font-weight:bold}
        .msg{color:red;margin-bottom:10px}
    </style>
</head>
<body>
<div class="wrap">
    <h2>Sửa sách</h2>

    <?php if ($thongbao): ?>
        <p class="msg"><?= htmlspecialchars($thongbao) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="tensach" value="<?= htmlspecialchars($row['TENSACH']) ?>" required>
        <input type="text" name="tacgia" value="<?= htmlspecialchars($row['TACGIA']) ?>" required>
        <input type="number" name="gia" value="<?= (float)$row['GIA'] ?>" min="0" required>
        <input type="text" name="hinhanh" value="<?= htmlspecialchars($row['HINHANH']) ?>">
        <button type="submit">Cập nhật</button>
    </form>
</div>
</body>
</html>