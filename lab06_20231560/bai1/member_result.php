<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET' || empty($_GET)) {
    echo "Không truy cập trực tiếp! <a href='register_member.php'>Quay lại</a>";
    exit;
}

$name    = trim($_GET['name'] ?? '');
$email   = trim($_GET['email'] ?? '');
$phone   = trim($_GET['phone'] ?? '');
$dob     = trim($_GET['dob'] ?? '');
$gender  = trim($_GET['gender'] ?? '');
$address = trim($_GET['address'] ?? '');

// Lưu CSV
$file = fopen("../data/members.csv", "a");
fputcsv($file, [$name, $email, $phone, $dob, $gender, $address]);
fclose($file);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết quả đăng ký</title>
</head>
<body>

<h2>Đăng ký thành công 🎉</h2>

<ul>
    <li>Họ tên: <?= htmlspecialchars($name) ?></li>
    <li>Email: <?= htmlspecialchars($email) ?></li>
    <li>SĐT: <?= htmlspecialchars($phone) ?></li>
    <li>Ngày sinh: <?= htmlspecialchars($dob) ?></li>
    <li>Giới tính: <?= htmlspecialchars($gender) ?></li>
    <li>Địa chỉ: <?= htmlspecialchars($address) ?></li>
</ul>

<a href="register_member.php">Đăng ký người mới</a>

</body>
</html>
