<?php
$raw = $_GET["names"] ?? "";
$names = [];

if ($raw !== "") {
    $parts = explode(",", $raw);
    $parts = array_map("trim", $parts);
    $names = array_filter($parts, fn($n) => $n !== "");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 1 - Danh sách tên</title>
</head>
<body>

<h2>BÀI 1 – DANH SÁCH TÊN</h2>

<p><b>Chuỗi gốc:</b> <?= htmlspecialchars($raw) ?></p>

<?php if (count($names) > 0): ?>
    <p><b>Số lượng tên hợp lệ:</b> <?= count($names) ?></p>
    <ol>
        <?php foreach ($names as $name): ?>
            <li><?= htmlspecialchars($name) ?></li>
        <?php endforeach; ?>
    </ol>
<?php else: ?>
    <p style="color:red;">Chưa có dữ liệu hợp lệ</p>
<?php endif; ?>

</body>
</html>
