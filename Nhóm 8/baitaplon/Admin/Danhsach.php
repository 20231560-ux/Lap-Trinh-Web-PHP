<?php
require __DIR__ . "/../config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sql = "SELECT MASACH, TENSACH, TACGIA, GIA, HINHANH FROM sach ORDER BY MASACH DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <style>
        body{font-family:Arial,sans-serif;background:#f5f5f5;padding:20px}
        .wrap{max-width:1100px;margin:auto;background:#fff;padding:20px;border-radius:12px}
        h2{margin-bottom:20px}
        .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}
        .btn{display:inline-block;padding:10px 16px;border-radius:8px;text-decoration:none;font-weight:bold}
        .btn-add{background:#198754;color:#fff}
        .btn-edit{background:#0d6efd;color:#fff}
        .btn-delete{background:#dc3545;color:#fff}
        table{width:100%;border-collapse:collapse}
        th,td{border:1px solid #ddd;padding:10px;text-align:left}
        th{background:#f0f0f0}
        img{width:70px;height:90px;object-fit:cover;border-radius:6px}
    </style>
</head>
<body>
<div class="wrap">
    <div class="topbar">
        <h2>Quản lý sản phẩm</h2>
        <a class="btn btn-add" href="them_sach.php">+ Thêm sách</a>
    </div>

    <table>
        <tr>
            <th>Mã</th>
            <th>Ảnh</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= (int)$row['MASACH'] ?></td>
                <td>
                    <img src="<?= BASE_URL ?>/assets/images/<?= htmlspecialchars(basename($row['HINHANH'] ?? 'default-book.jpg')) ?>"
                         onerror="this.onerror=null;this.src='<?= BASE_URL ?>/assets/images/default-book.jpg';">
                </td>
                <td><?= htmlspecialchars($row['TENSACH']) ?></td>
                <td><?= htmlspecialchars($row['TACGIA']) ?></td>
                <td><?= number_format($row['GIA'], 0, ',', '.') ?> ₫</td>
                <td>
                    <a class="btn btn-edit" href="sua_sach.php?id=<?= (int)$row['MASACH'] ?>">Sửa</a>
                    <a class="btn btn-delete"
                     href="xoa_sach.php?id=<?= (int)$row['MASACH'] ?>"
                    onclick="return confirm('Bạn có chắc muốn xóa sách này?')">Xóa</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>