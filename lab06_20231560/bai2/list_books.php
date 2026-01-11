<?php
$filePath = "../data/books.json";
$books = json_decode(file_get_contents($filePath), true);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Danh sách sách</title>
</head>
<body>

<h2>Danh sách sách trong thư viện</h2>

<table border="1" cellpadding="5">
<tr>
<th>Mã</th><th>Tên</th><th>Tác giả</th><th>Năm</th><th>Thể loại</th><th>Số lượng</th>
</tr>

<?php foreach ($books as $b): ?>
<tr>
<td><?= htmlspecialchars($b['code']) ?></td>
<td><?= htmlspecialchars($b['title']) ?></td>
<td><?= htmlspecialchars($b['author']) ?></td>
<td><?= htmlspecialchars($b['year']) ?></td>
<td><?= htmlspecialchars($b['category']) ?></td>
<td><?= htmlspecialchars($b['quantity']) ?></td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a href="add_book.php">Thêm sách mới</a>

</body>
</html>
