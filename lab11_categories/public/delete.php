<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
$stmt->execute([$id]);

$_SESSION['flash'] = 'Xóa thành công!';
header('Location: index.php');
exit;
