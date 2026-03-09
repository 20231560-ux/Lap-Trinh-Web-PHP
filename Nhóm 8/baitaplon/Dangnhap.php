<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_css = "Dangnhap.css";
$page_js  = "Dangnhap.js";

require BASE_PATH . "/header.php";
?>

<div class="login-page">
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <p class="login-subtitle">Vui lòng nhập tài khoản để tiếp tục</p>

        <?php if (isset($_SESSION['login_error'])): ?>
            <div style="color:red; margin-bottom:12px; font-weight:bold;">
                <?= $_SESSION['login_error'] ?>
            </div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>/xulyDN.php" method="POST">
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>

            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>

            <button type="submit" class="login-btn">Đăng nhập</button>

            <div class="extra">
                <a href="#">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</div>

<?php require BASE_PATH . "/footer.php"; ?>