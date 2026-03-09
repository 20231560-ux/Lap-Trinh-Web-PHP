<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_css = "timkiem.css";
require BASE_PATH . "/header.php";

$keyword = trim($_GET['keyword'] ?? '');
$books = [];
$error = '';

if ($keyword !== '') {
    $keyword_safe = mysqli_real_escape_string($conn, $keyword);

    $sql = "SELECT MASACH, TENSACH, TACGIA, GIA, HINHANH
            FROM sach
            WHERE TENSACH LIKE '%$keyword_safe%'
               OR TACGIA LIKE '%$keyword_safe%'
            ORDER BY MASACH DESC";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }
        mysqli_free_result($result);
    } else {
        $error = "Lỗi truy vấn: " . mysqli_error($conn);
    }
}
?>

<div class="search-page">
    <div class="search-container">
        <h1>Kết quả tìm kiếm sách</h1>

        <form class="search-form" action="<?= BASE_URL ?>/Timkiem.php" method="GET">
            <input 
                type="text" 
                name="keyword" 
                value="<?= htmlspecialchars($keyword) ?>" 
                placeholder="Nhập tên sách hoặc tác giả..."
                required
            >
            <button type="submit">Tìm kiếm</button>
        </form>

        <?php if ($keyword === ''): ?>
            <p class="search-note">Vui lòng nhập từ khóa để tìm sách.</p>

        <?php elseif ($error !== ''): ?>
            <p class="search-error"><?= htmlspecialchars($error) ?></p>

        <?php elseif (count($books) > 0): ?>
            <p class="search-count">
                Tìm thấy <strong><?= count($books) ?></strong> kết quả cho:
                "<strong><?= htmlspecialchars($keyword) ?></strong>"
            </p>

            <div class="book-grid">
                <?php foreach ($books as $b): ?>
                    <?php
                        $masach = (int)($b['MASACH'] ?? 0);
                        $tensach = $b['TENSACH'] ?? 'Chưa có tên sách';
                        $tacgia = $b['TACGIA'] ?? 'Chưa có tác giả';
                        $gia = (float)($b['GIA'] ?? 0);
                        $hinhanh = basename(trim($b['HINHANH'] ?? 'default-book.jpg'));
                        $imgPath = BASE_URL . '/assets/images/' . rawurlencode($hinhanh);
                    ?>

                    <div class="book-card">
                        <img 
                            src="<?= $imgPath ?>" 
                            alt="<?= htmlspecialchars($tensach) ?>"
                            onerror="this.onerror=null;this.src='<?= BASE_URL ?>/assets/images/default-book.jpg';"
                        >

                        <div class="book-info">
                            <h3><?= htmlspecialchars($tensach) ?></h3>
                            <p class="author"><i><?= htmlspecialchars($tacgia) ?></i></p>
                            <p class="price">Giá: <span><?= number_format($gia, 0, ',', '.') ?> ₫</span></p>

                            <div class="btn-group">
                                <a class="btn-add" href="<?= BASE_URL ?>/themvaogiohang.php?id=<?= $masach ?>">
                                    Thêm vào giỏ
                                </a>

                                <a class="btn-buy" href="<?= BASE_URL ?>/thanhtoan.php?id=<?= $masach ?>">
                                    Mua ngay
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <p class="search-empty">
                Không tìm thấy sách nào với từ khóa:
                "<strong><?= htmlspecialchars($keyword) ?></strong>"
            </p>
        <?php endif; ?>
    </div>
</div>

<?php require BASE_PATH . "/footer.php"; ?>