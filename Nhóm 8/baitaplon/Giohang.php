<?php
require __DIR__ . "/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_css = "giohang.css";
require BASE_PATH . "/header.php";
?>

<div class="cart-page">
    <div class="cart-container">

        <!-- Thông báo thêm sản phẩm thành công -->
        <?php if (isset($_SESSION['cart_message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['cart_message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['cart_message']); ?>
        <?php endif; ?>

        <h2>Giỏ hàng của bạn</h2>

        <?php
        // Lấy giỏ hàng từ session
        $cart = $_SESSION['cart'] ?? [];
        $tongTien = 0;

        foreach ($cart as $item) {
            $thanhTien = ($item['gia'] ?? 0) * ($item['soluong'] ?? 1);
            $tongTien += $thanhTien;
        }
        ?>

        <?php if (empty($cart)): ?>
            <div class="empty-cart text-center py-5">
                <p class="lead">Giỏ hàng của bạn đang trống.</p>
                <a href="<?= BASE_URL ?>/Sanpham.php" class="btn btn-primary btn-lg mt-3">
                    Tiếp tục mua hàng
                </a>
            </div>
        <?php else: ?>

            <div class="cart-table">
                <div class="cart-header">
                    <div>Sản phẩm</div>
                    <div>Đơn giá</div>
                    <div>Số lượng</div>
                    <div>Thành tiền</div>
                    <div>Thao tác</div>
                </div>

                <?php foreach ($cart as $id => $item): ?>
                    <?php
                    $gia       = $item['gia']       ?? 0;
                    $soluong   = $item['soluong']   ?? 1;
                    $thanhTien = $gia * $soluong;
                    ?>
                    <div class="cart-row">
                        <div class="cart-product d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/images/<?= htmlspecialchars($item['hinhanh'] ?? 'no-image.jpg') ?>" 
                                 alt="<?= htmlspecialchars($item['ten'] ?? 'Sản phẩm') ?>" 
                                 width="80" class="me-3 rounded shadow-sm">
                            <span class="fw-medium"><?= htmlspecialchars($item['ten'] ?? 'Không có tên') ?></span>
                        </div>

                        <div class="cart-price">
                            <?= number_format($gia) ?>đ
                        </div>

                        <div class="cart-qty d-flex align-items-center">
                            <a href="<?= BASE_URL ?>/capnhat_giohang.php?action=giam&id=<?= urlencode($id) ?>" 
                               class="qty-btn btn btn-outline-secondary btn-sm">-</a>
                            <span class="mx-3 fw-bold"><?= $soluong ?></span>
                            <a href="<?= BASE_URL ?>/capnhat_giohang.php?action=tang&id=<?= urlencode($id) ?>" 
                               class="qty-btn btn btn-outline-secondary btn-sm">+</a>
                        </div>

                        <div class="cart-total fw-bold text-danger">
                            <?= number_format($thanhTien) ?>đ
                        </div>

                        <div class="cart-action">
                            <a href="<?= BASE_URL ?>/capnhat_giohang.php?action=xoa&id=<?= urlencode($id) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                Xóa
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-footer d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">
                <a href="<?= BASE_URL ?>/Sanpham.php" class="btn btn-outline-primary">
                    ← Tiếp tục mua hàng
                </a>

                <div class="cart-summary text-end">
                    <p class="fs-4 mb-2">
                        Tổng cộng: 
                        <strong class="text-danger"><?= number_format($tongTien) ?>đ</strong>
                    </p>
                    <a href="<?= BASE_URL ?>/Thanhtoan.php" class="btn btn-success btn-lg px-5 py-3">
                        Thanh toán
                    </a>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>

<?php require BASE_PATH . "/footer.php"; ?>