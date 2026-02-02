<?php
$page_css = "trangchu.css";
$page_js  = "trangchu.js";
include "header.php";
?>

<div class="l1">      
    <img src="assets/images/logo.jpg" alt="Logo" width="120" height="100">

    <div class="l2"> 
        <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Tìm kiếm...">
            <button type="submit" class="icon"></button> 
        </form>
    </div>

    <div class="jl">
        <i>Số hotline: 0332232382</i>
        <a href="giohang.php" class="l4">🛒 Giỏ Hàng</a>
    </div>
</div>

<div class="l5">
    <a class="l6 active" href="Trangchu.php">Trang Chủ</a>
    <a class="l6" href="Sanpham.php">Sản Phẩm</a>
    <a class="l6" href="Tintuc.php">Tin Tức</a>
    <a class="l6" href="Lienhe.php">Liên Hệ</a>
    <a class="l6" href="Hoso.php">Hồ sơ</a>
</div>

<?php include "footer.php"; ?>
