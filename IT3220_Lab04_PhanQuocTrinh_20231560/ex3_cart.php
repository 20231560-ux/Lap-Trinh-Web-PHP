<?php
function h($s) {
    return htmlspecialchars($s);
}

$products = [
    ["name" => "Bút", "price" => 5000, "qty" => 10],
    ["name" => "Vở", "price" => 12000, "qty" => 5],
    ["name" => "Sách", "price" => 50000, "qty" => 2]
];

$products = array_map(function($p) {
    $p["amount"] = $p["price"] * $p["qty"];
    return $p;
}, $products);

$total = array_reduce($products, fn($sum, $p) => $sum + $p["amount"], 0);

$maxProduct = $products[0];
foreach ($products as $p) {
    if ($p["amount"] > $maxProduct["amount"]) {
        $maxProduct = $p;
    }
}

$sorted = $products;
usort($sorted, fn($a, $b) => $b["price"] <=> $a["price"]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 3 - Giỏ hàng</title>
</head>
<body>

<h2>BÀI 3 – GIỎ HÀNG</h2>

<table border="1" cellpadding="5">
<tr>
    <th>STT</th>
    <th>Tên</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>

<?php foreach ($products as $i => $p): ?>
<tr>
    <td><?= $i + 1 ?></td>
    <td><?= h($p["name"]) ?></td>
    <td><?= $p["price"] ?></td>
    <td><?= $p["qty"] ?></td>
    <td><?= $p["amount"] ?></td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="4"><b>Tổng tiền</b></td>
    <td><b><?= $total ?></b></td>
</tr>
</table>

<p><b>Sản phẩm có thành tiền lớn nhất:</b> <?= h($maxProduct["name"]) ?></p>

</body>
</html>
