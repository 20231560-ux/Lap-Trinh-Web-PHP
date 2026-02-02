<?php
session_start();
require "db.php";


$tendn = $_POST['tendn'];
$mk = $_POST['mk'];


$sql = "SELECT * FROM NGUOIDUNG WHERE TENDN=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$tendn]);
$user = $stmt->fetch();


if ($user && password_verify($mk, $user['MK'])) {
$_SESSION['user'] = $user['TENDN'];
$_SESSION['role'] = $user['VAITRO'];
header("Location: Trangchu.php");
} else {
header("Location: Dangnhap.php?error=1");
}