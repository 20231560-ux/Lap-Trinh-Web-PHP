<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
<h2>Đăng nhập</h2>
<form method="post" action="Xuly_dangnhap.php">
<input type="text" name="tendn" placeholder="Tên đăng nhập" required><br>
<input type="password" name="mk" placeholder="Mật khẩu" required><br>
<button>Đăng nhập</button>
</form>
<?php if(isset($_GET['error'])) echo "<p style='color:red'>Sai thông tin</p>"; ?>
</body>
</html>