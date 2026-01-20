<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tạo đơn hàng</title>
</head>
<body>

<h2>Tạo đơn hàng</h2>

<form method="POST" action="/Labs/lab10_sales/public/index.php?controller=orders&action=store">


    <p>
        Khách hàng:
        <select name="customer_id" required>
            <?php foreach ($customers as $c): ?>
                <option value="<?= $c['id'] ?>">
                    <?= $c['full_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <h3>Sản phẩm</h3>

    <?php foreach ($products as $p): ?>
        <p>
            <?= $p['name'] ?> (<?= $p['price'] ?>đ)
            Số lượng:
            <input type="number" name="items[<?= $p['id'] ?>]" value="0" min="0">
        </p>
    <?php endforeach; ?>

    <button type="submit">Lưu đơn</button>
</form>

</body>
</html>
