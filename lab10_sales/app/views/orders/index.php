<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách đơn hàng</title>
</head>
<body>

<h2>Danh sách đơn hàng</h2>

<a href="/Labs/lab10_sales/public/orders/create">+ Tạo đơn mới</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Ngày</th>
        <th>Tổng tiền</th>
    </tr>

    <?php foreach ($orders as $o): ?>
    <tr>
        <td><?= $o['id'] ?></td>
        <td><?= $o['full_name'] ?></td>
        <td><?= $o['order_date'] ?></td>
        <td><?= number_format($o['total']) ?> đ</td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
