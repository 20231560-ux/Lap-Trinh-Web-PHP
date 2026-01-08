<?php
require_once "includes/auth.php";
require_login();

$products = [
    1 => ['name'=>'Bút', 'price'=>5000],
    2 => ['name'=>'Vở', 'price'=>10000],
    3 => ['name'=>'Thước', 'price'=>7000]
];

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<h2>GIỎ HÀNG</h2>

<?php if (empty($cart)): ?>
<p>Giỏ hàng trống</p>
<?php endif; ?>

<?php foreach ($cart as $id => $qty): 
    $sum = $products[$id]['price'] * $qty;
    $total += $sum;
?>
<p>
<?=htmlspecialchars($products[$id]['name'])?> |
SL: <?=$qty?> |
<?=number_format($sum)?>đ
</p>
<?php endforeach; ?>

<p><b>TỔNG: <?=number_format($total)?>đ</b></p>

<a href="products.php">Quay lại sản phẩm</a>
