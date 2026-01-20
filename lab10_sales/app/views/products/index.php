<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #f2f2f2; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>

<h2>Danh sách sản phẩm</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Thao tác</th>
    </tr>

    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= number_format($p['price']) ?> VND</td>
        <td>
            <a href="#">Sửa</a> | 
            <a href="#" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
