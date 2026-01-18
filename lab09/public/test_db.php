<?php
require __DIR__ . '/../app/core/Database.php';

try {
    $db = new Database();
    echo "Kết nối thành công";
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
