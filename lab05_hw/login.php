<?php
session_start();
require_once "includes/users.php";
require_once "includes/flash.php";

$username_cookie = $_COOKIE['remember_username'] ?? '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = $_POST['password'] ?? '';

    if (isset($users[$u]) && password_verify($p, $users[$u]['hash'])) {
        $_SESSION['auth'] = true;
        $_SESSION['user'] = [
            'username' => $u,
            'role' => $users[$u]['role']
        ];

        if (!empty($_POST['remember'])) {
            setcookie('remember_username', $u, time()+7*24*3600, '/');
        }

        set_flash('success', 'Đăng nhập thành công');
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai tài khoản hoặc mật khẩu";
    }
}
?>

<h2>LOGIN</h2>

<?php if ($error): ?>
<p style="color:red"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="post">
    Username:
    <input name="username" value="<?=htmlspecialchars($username_cookie)?>"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <label>
        <input type="checkbox" name="remember"> Remember me
    </label><br><br>

    <button>Login</button>
</form>
