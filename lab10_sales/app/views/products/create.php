<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
</head>
<body>

<h2>Thêm sản phẩm</h2>

<form method="POST" action="/Labs/lab10_sales/public/index.php?controller=products&action=store">

    <p>
        Tên sản phẩm:<br>
        <input type="text" name="name" required>
    </p>

    <p>
        SKU:<br>
        <input type="text" name="sku">
    </p>

    <p>
        Giá:<br>
        <input type="number" name="price" min="0" step="0.01" required>
    </p>

    <p>
        Tồn kho:<br>
        <input type="number" name="stock" min="0" value="0">
    </p>

    <button type="submit">Lưu</button>

</form>

</body>
</html>
