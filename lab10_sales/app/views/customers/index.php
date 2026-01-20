<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách khách hàng</title>
</head>
<body>

<h2>Danh sách khách hàng</h2>

<a href="/Labs/lab10_sales/public/customers/create">
    ➕ Thêm khách hàng
</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>SĐT</th>
    </tr>

    <?php foreach ($customers as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= htmlspecialchars($c['full_name']) ?></td>
        <td><?= htmlspecialchars($c['email']) ?></td>
        <td><?= htmlspecialchars($c['phone']) ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
