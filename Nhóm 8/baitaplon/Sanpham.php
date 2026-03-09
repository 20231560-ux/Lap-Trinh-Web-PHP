<?php
// Bật báo lỗi để debug (sau này tắt khi production bằng cách comment 2 dòng này)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Require config (nên dùng __DIR__ để an toàn)
require __DIR__ . "/config.php";

// Kiểm tra kết nối DB
if (!isset($conn)) {
    die("LỖI: Biến \$conn chưa được định nghĩa. Kiểm tra file config.php");
}

if ($conn === null || !($conn instanceof mysqli)) {
    die("LỖI: Kết nối database thất bại hoặc \$conn không phải là đối tượng mysqli.<br>" 
        . "Thông báo lỗi kết nối: " . mysqli_connect_error());
}

// Debug thành công (xóa hoặc comment dòng này sau khi test OK)
echo "<!-- Debug: Kết nối database thành công -->";

$page_css = "sanpham.css";
$page_js  = "sanpham.js";

// Require header (dùng BASE_PATH nếu đã define, hoặc __DIR__)
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
    <a class="l6  " href="<?= BASE_URL ?>/Trangchu.php">Trang Chủ</a>
    <a class="l6 active" href="<?= BASE_URL ?>/Sanpham.php">Sản Phẩm</a>
    <a class="l6" href="<?= BASE_URL ?>/Tintuc.php">Tin Tức</a>
    <a class="l6" href="<?= BASE_URL ?>/Lienhe.php">Liên Hệ</a>

   <?php if (isset($_SESSION['user']) || isset($_SESSION['hoten'])): ?>
    <div class="user-menu">
        <button type="button" class="user-btn" id="userBtn">
            👤 <?= htmlspecialchars($_SESSION['hoten'] ?? $_SESSION['user'] ?? 'Tài khoản') ?> ▼
        </button>

        <div class="dropdown-menu" id="userDropdown">
            <a href="<?= BASE_URL ?>/Dangxuat.php">Đăng xuất</a>
        </div>
    </div>
<?php else: ?>
    <a class="l6" href="<?= BASE_URL ?>/Dangnhap.php">Đăng nhập</a>
<?php endif; ?>
</div>
<!-- ====================== DANH SÁCH SÁCH TỪ DATABASE ====================== -->
<!-- ====================== DANH SÁCH SÁCH TỪ DATABASE ====================== -->
<div class="l9">
<?php
$sql = "SELECT MASACH, TENSACH, TACGIA, GIA, HINHANH 
        FROM sach 
        ORDER BY MASACH DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<p class='error' style='text-align:center; color:red; padding:20px;'>
            Lỗi truy vấn cơ sở dữ liệu: " . mysqli_error($conn) . "
          </p>";
    error_log("Lỗi truy vấn sách trang sản phẩm: " . mysqli_error($conn));
} else {
    if (mysqli_num_rows($result) > 0) {
        while ($b = mysqli_fetch_assoc($result)) {

            $masach  = (int)($b['MASACH'] ?? 0);
            $tensach = $b['TENSACH'] ?? 'Chưa có tên sách';
            $tacgia  = $b['TACGIA'] ?? 'Chưa có tác giả';
            $gia     = (float)($b['GIA'] ?? 0);

            $hinhanh = trim($b['HINHANH'] ?? '');
            if ($hinhanh === '') {
                $hinhanh = 'default-book.jpg';
            }

            $hinhanh = basename($hinhanh);
            $duongdananh = BASE_URL . '/assets/images/' . rawurlencode($hinhanh);
            ?>
            
            <div class="l10">
                <img src="<?= $duongdananh ?>" 
                     alt="<?= htmlspecialchars($tensach) ?>"
                     onerror="this.onerror=null;this.src='<?= BASE_URL ?>/assets/images/default-book.jpg';"
                     loading="lazy">

                <div class="info">
                    <h3 class="ten-sp"><?= htmlspecialchars($tensach) ?></h3>
                    <p class="author"><i><?= htmlspecialchars($tacgia) ?></i></p>
                    <p class="price">Giá: <span><?= number_format($gia, 0, ',', '.') ?> ₫</span></p>

                  <div class="btn-group">
    <a class="btn-add" href="<?= BASE_URL ?>/themvaogiohang.php?id=<?= $masach ?>">
        Thêm vào giỏ hàng
    </a>

    <a class="btn-buy" href="<?= BASE_URL ?>/thanhtoan.php?id=<?= $masach ?>">
        Mua ngay
    </a>
</div>
                </div>
            </div>

            <?php
        }
    } else {
        echo "<div class='no-products' style='text-align:center; padding:40px; color:#555;'>
                <p>Hiện tại chưa có sản phẩm nào để hiển thị.</p>
              </div>";
    }

    mysqli_free_result($result);
}
?>
</div>

<?php 
// Include footer
include BASE_PATH . "/footer.php"; 
?>