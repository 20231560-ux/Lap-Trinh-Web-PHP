<?php
require __DIR__ . "/config.php";   

$page_css = "lienhe.css";
$page_js  = "lienhe.js";

require BASE_PATH . "/header.php";
?>

<div class="l1">      
    <img src="assets/images/book.png" alt="Logo" width="120" height="100">

    <div class="l2"> 
        <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Tìm kiếm...">
            <button type="submit" class="icon"></button> 
        </form>
    </div>

    <div class="jo">
        <i>Số hotline: 0332232382</i>
        <a href="giohang.php" class="l4">🛒 Giỏ Hàng</a>
    </div>
</div>

<div class="l5">
    <a class="l6 " href="<?= BASE_URL ?>/Trangchu.php">Trang Chủ</a>
    <a class="l6" href="<?= BASE_URL ?>/Sanpham.php">Sản Phẩm</a>
    <a class="l6" href="<?= BASE_URL ?>/Tintuc.php">Tin Tức</a>
    <a class="l6 active" href="<?= BASE_URL ?>/Lienhe.php">Liên Hệ</a>

   <?php if (isset($_SESSION['user'])): ?>
        <div class="user-menu">
            <button type="button" class="user-btn" id="userBtn">
                👤 <?= $_SESSION['hoten'] ?? $_SESSION['user'] ?> ▼
            </button>

            <div class="dropdown-menu" id="userDropdown">
                <a href="<?= BASE_URL ?>/Dangxuat.php">Đăng xuất</a>
            </div>
        </div>
    <?php else: ?>
        <a class="l6" href="<?= BASE_URL ?>/Dangnhap.php">Đăng nhập</a>
    <?php endif; ?>
</div>

<div class="l7">
  <div class="left">
    <div class="top">
      <p class="jk">Địa chỉ: Cụm Công nghiệp vừa và nhỏ Từ Liêm, Cầu Diễn, Bắc Từ Liêm, Hà Nội, Việt Nam</p>
      <p class="jk">Sđt: 0332232382</p>
      <p class="jk">Email: thuongmaidientu@gmail.com</p>
    </div>

    <div class="bottom">
      <p class="jl">Nhập thông tin khách hàng</p>

      <p>
        <label>Họ tên:</label>
        <input type="text" placeholder="Họ tên..." class="T">
      </p>

      <p>
        <label>Email:</label>
        <input type="email" placeholder="Email..." class="T">
      </p>

      <p>
        <label>Nội dung:</label>
        <input type="text" placeholder="Nhập nội dung..." class="T">
      </p>

      <button class="l8">Gửi</button>
    </div>
  </div>

  <div class="right">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1440.0637702212362!2d105.74113732710715!3d21.040639548424274!3m2!1i1024!2i768!4f13.1!5e1!3m2!1svi!2sus!4v1763206750150!5m2!1svi!2sus"
      width="100%"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy">
    </iframe>
  </div>
</div>
<div class="l9">
  <div class="left">
    <i class="l12"><img class="l11" src="assets/images/fb.png"> Facebook</i>
    <i class="l12"><img class="l11" src="assets/images/tt.png"> Tiktok</i>
    <i class="l12"><img class="l11" src="assets/images/inta.png"> Instagram</i>
    <i class="l12"><img class="l11" src="assets/images/tw.png"> Twitter</i>
  </div>

  <div class="footer-right">
    <div class="col">
      <p class="hh">Hỗ trợ khách hàng</p>
      <a href="Trangchu.php">Trang chủ</a>
      <a href="Sanpham.php">Sản phẩm</a>
      <a href="Tintuc.php">Tin tức</a>
      <a href="Lienhe.php">Liên hệ</a>
    </div>

    <div class="col">
      <p class="hh">Chính sách</p>
      <a href="#">Giới thiệu</a>
      <a href="#">Bảo mật</a>
    </div>

    <div class="col">
      <p class="hh">Liên hệ</p>
      <p>Sđt: 0332232382</p>
      <p>Email: thuongmaidientu@gmail.com</p>
    </div>
  </div>
</div>

<footer class="footer">
    📧 Email: <a href="mailto:thuongmaidientu@gmail.com">thuongmaidientu@gmail.com</a>
</footer>

</body>
</html>


<?php include "footer.php"; ?>
