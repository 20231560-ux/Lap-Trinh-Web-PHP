<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm khách hàng</title>
</head>
<body>

<h2>Thêm khách hàng</h2>

<form method="POST" action="/Labs/lab10_sales/public/index.php?controller=customers&action=store">

    <p>
        Họ tên:<br>
        <input type="text" name="full_name" required>
    </p>

    <p>
        Email:<br>
        <input type="email" name="email">
    </p>

    <p>
        SĐT:<br>
        <input type="text" name="phone">
    </p>

    <button type="submit">Lưu</button>
</form>

</body>
</html>
