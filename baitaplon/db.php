<?php
$host = "localhost";
$db = "webbansach"; // đổi tên CSDL
$user = "root";
$pass = "";


$conn = new PDO(
"mysql:host=127.0.0.1;port=3306;dbname=$db;charset=utf8",
$user,
$pass,
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
?>