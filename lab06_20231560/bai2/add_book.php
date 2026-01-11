<?php
$errors = [];
$data = [
    'code' => '',
    'title' => '',
    'author' => '',
    'year' => '',
    'category' => 'Giáo trình',
    'quantity' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($data as $k => $v) {
        $data[$k] = trim($_POST[$k] ?? '');
    }

    // Validate
    if ($data['code'] === '') $errors[] = "Mã sách không được để trống";
    if ($data['title'] === '') $errors[] = "Tên sách không được để trống";
    if ($data['author'] === '') $errors[] = "Tác giả không được để trống";

    $currentYear = date('Y');
    if ($data['year'] === '' || $data['year'] < 1900 || $data['year'] > $currentYear) {
        $errors[] = "Năm xuất bản phải từ 1900 đến $currentYear";
    }

    if ($data['quantity'] === '' || $data['quantity'] < 0) {
        $errors[] = "Số lượng phải ≥ 0";
    }

    $filePath = "../data/books.json";
    $books = json_decode(file_get_contents($filePath), true);

    // Check trùng mã
    foreach ($books as $b) {
        if ($b['code'] === $data['code']) {
            $errors[] = "Mã sách đã tồn tại";
            break;
        }
    }

    // Lưu
    if (empty($errors)) {
        $books[] = $data;
        file_put_contents($filePath, json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header("Location: list_books.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Thêm sách</title>
</head>
<body>

<h2>Thêm sách vào thư viện</h2>

<?php if ($errors): ?>
<ul style="color:red;">
<?php foreach ($errors as $e): ?>
<li><?= htmlspecialchars($e) ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post">
Mã sách: <input name="code" value="<?= htmlspecialchars($data['code']) ?>"><br><br>
Tên sách: <input name="title" value="<?= htmlspecialchars($data['title']) ?>"><br><br>
Tác giả: <input name="author" value="<?= htmlspecialchars($data['author']) ?>"><br><br>
Năm XB: <input type="number" name="year" value="<?= htmlspecialchars($data['year']) ?>"><br><br>

Thể loại:
<select name="category">
<?php
$cats = ["Giáo trình","Kỹ năng","Văn học","Khoa học","Khác"];
foreach ($cats as $c) {
    $sel = ($data['category']==$c) ? 'selected' : '';
    echo "<option $sel>$c</option>";
}
?>
</select><br><br>

Số lượng: <input type="number" name="quantity" value="<?= htmlspecialchars($data['quantity']) ?>"><br><br>

<button type="submit">Thêm sách</button>
</form>

</body>
</html>
