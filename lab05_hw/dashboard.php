<?php
require_once "includes/auth.php";
require_once "includes/flash.php";
require_once "includes/csrf.php";
require_login();
?>

<h2>DASHBOARD</h2>

<?php if ($msg = get_flash('success')): ?>
<p style="color:green"><?=htmlspecialchars($msg)?></p>
<?php endif; ?>

<p>Xin chào <b><?=htmlspecialchars($_SESSION['user']['username'])?></b></p>

<a href="products.php">Sản phẩm</a> |
<a href="cart.php">Giỏ hàng</a>

<form method="post" action="logout.php" style="margin-top:20px">
    <input type="hidden" name="csrf" value="<?=csrf_token()?>">
    <button>Logout</button>
</form>
