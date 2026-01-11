<?php
$errors = [];
$data = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'dob' => '',
    'gender' => 'Nam',
    'address' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($data as $key => $value) {
        $data[$key] = trim($_POST[$key] ?? '');
    }

    // Validate
    if ($data['name'] === '') {
        $errors[] = "Họ tên không được để trống";
    }

    if ($data['email'] === '') {
        $errors[] = "Email không được để trống";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ";
    }

    if ($data['phone'] === '') {
        $errors[] = "Số điện thoại không được để trống";
    } elseif (!preg_match('/^[0-9]{9,11}$/', $data['phone'])) {
        $errors[] = "Số điện thoại phải 9–11 chữ số";
    }

    if ($data['dob'] === '') {
        $errors[] = "Ngày sinh không được để trống";
    }

    // Nếu không lỗi → chuyển sang trang kết quả
    if (empty($errors)) {
        header("Location: member_result.php?" . http_build_query($data));
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thẻ thư viện</title>
</head>
<body>
<h2>Đăng ký thẻ thư viện</h2>

<?php if ($errors): ?>
<ul style="color:red;">
    <?php foreach ($errors as $e): ?>
        <li><?= htmlspecialchars($e) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post">
    Họ tên: <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>"><br><br>

    Email: <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>"><br><br>

    SĐT: <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>"><br><br>

    Ngày sinh: <input type="date" name="dob" value="<?= htmlspecialchars($data['dob']) ?>"><br><br>

    Giới tính:
    <input type="radio" name="gender" value="Nam" <?= $data['gender']=='Nam'?'checked':'' ?>> Nam
    <input type="radio" name="gender" value="Nữ" <?= $data['gender']=='Nữ'?'checked':'' ?>> Nữ
    <input type="radio" name="gender" value="Khác" <?= $data['gender']=='Khác'?'checked':'' ?>> Khác
    <br><br>

    Địa chỉ:<br>
    <textarea name="address"><?= htmlspecialchars($data['address']) ?></textarea><br><br>

    <button type="submit">Đăng ký</button>
    <button type="reset">Reset</button>
</form>

</body>
</html>
