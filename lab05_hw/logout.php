<?php
session_start();
require_once "includes/csrf.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !csrf_verify($_POST['csrf'] ?? '')) {
    exit("Bad Request");
}

session_destroy();
setcookie('remember_username', '', time()-3600, '/');
header("Location: login.php");
