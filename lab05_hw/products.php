<?php
require_once "includes/auth.php";
require_login();

$products = [
    1 => ['name'=>'Bút', 'price'=>5000],
    2 => ['name'=>'Vở', 'price'=>10000],
    3 => ['name'=>'Thước', 'price'=>7000]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}
?>

<h2>PRODUCTS</h2>

<?php foreach ($products as $id => $p): ?>
<form method="post">
    <?=htmlspecialchars($p['name'])?> -
    <?=number_format($p['price'])?>đ
    <input type="hidden" name="id" value="<?=$id?>">
    <button>Thêm</button>
</form>
<?php endforeach; ?>

<br>
<a href="cart.php">Xem giỏ hàng</a>
