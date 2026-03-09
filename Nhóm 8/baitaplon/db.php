<?php
try {
    $conn = new PDO(
        "mysql:host=127.0.0.1;port=3306;dbname=webbansach;charset=utf8",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Lỗi kết nối DB: " . $e->getMessage());
}
?>