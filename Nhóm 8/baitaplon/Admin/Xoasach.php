<?php
require __DIR__ . "/../config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM sach WHERE MASACH = $id";
    mysqli_query($conn, $sql);
}

header("Location: " . BASE_URL . "/Admin/danhsach.php");
exit;