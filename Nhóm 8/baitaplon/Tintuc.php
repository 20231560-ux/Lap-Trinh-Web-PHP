<?php
require __DIR__ . "/config.php";   // 👈 dòng này PHẢI CÓ

$page_css = "tintuc.css";
$page_js  = "tintuc.js";

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

    <div class="jl">
        <i>Số hotline: 0332232382</i>
        <a href="giohang.php" class="l4">🛒 Giỏ Hàng</a>
    </div>
</div>
  <div class="l5">
    <a class="l6 " href="<?= BASE_URL ?>/Trangchu.php">Trang Chủ</a>
    <a class="l6" href="<?= BASE_URL ?>/Sanpham.php">Sản Phẩm</a>
    <a class="l6 active" href="<?= BASE_URL ?>/Tintuc.php">Tin Tức</a>
    <a class="l6" href="<?= BASE_URL ?>/Lienhe.php">Liên Hệ</a>

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

    <h2 class="title">Tin tức nổi bật</h2>

    <div class="slider">
        <div class="slides">

            <?php
            $featured = [
                [
                    "img" => "tt2.jpeg",
                    "title" => "Sách'Người Hà Nội-chuyện ăn,chuyện uống một thời'đạt giải tại Trung Quồc vào năm 2025",
                    "desc" => "Ấn bản tiếng Trung cuốn sách “Người Hà Nội - chuyện ăn, 
                    chuyện uống một thời” của tác giả Vũ Thế Long vừa đạt giải Sách Đông Nam Á
                     có sức ảnh hưởng tại Trung Quốc năm 2025."
                ],
                [
                    "img" => "tt3.jpg",
                    "title" => "“Một số tác phẩm chính luận tiêu biểu” - Di sản ngôn luận sáng ngời của Bác",
                    "desc" => "Cuốn sách “Hồ Chí Minh - Một số tác phẩm chính luận tiêu biểu” của Chủ tịch Hồ Chí Minh,
                     được Nhà Xuất bản Chính trị quốc gia Sự thật ra mắt đúng dịp kỷ niệm 100 năm Ngày Báo chí cách mạng
                      Việt Nam (21/6/1925 - 21/6/2025), là tài liệu quý, góp phần khẳng định sức sống mạnh mẽ, tầm vóc tư 
                      tưởng và giá trị bền vững của báo chí cách mạng Việt Nam trong suốt một thế kỷ qua."
                ]
            ];
            ?>

            <?php foreach ($featured as $k => $f): ?>
            <div class="slide <?= $k == 0 ? 'active' : '' ?>">
                <img src="assets/images/<?= $f['img'] ?>">
                <div class="slide-text">
                    <h3><?= $f['title'] ?></h3>
                    <p><?= $f['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <button class="prev">❮</button>
        <button class="next">❯</button>
    </div>

    <h2 class="title">Tin tức khác</h2>

    <?php
    $news = [
        ["tt4.webp", "Cuốn sách “Báo chí, truyền thông Việt Nam- Một số vấn đề lý luận và thực tiễn” ra mắt đúng dịp kỷ niệm 95 năm Ngày Báo chí cách mạng Việt Nam.."],
        ["tt5.webp", "Xuất bản bộ 25 cuốn sách về nghiệp vụ báo chí"],
        ["tt7.jpg", "Trưng bày sách, báo chủ đề “Hồ Chí Minh - Trọn cuộc đời vì nước, vì dân”"]
    ];
    ?>

    <div class="news-grid">
        <?php foreach ($news as $n): ?>
        <div class="news-card">
            <img src="assets/images/<?= $n[0] ?>">
            <h4><?= $n[1] ?></h4>
            <p><?= $n[1] ?></p>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php include "footer.php"; ?>
