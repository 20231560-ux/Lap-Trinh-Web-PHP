<?php
require __DIR__ . "/config.php";
$page_css = "thanhtoan.css";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cart = [];
$total = 0;
$giamgia = 0;
$ma_voucher = '';
$thongbao_voucher = '';

// Mua ngay 1 sản phẩm
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql = "SELECT MASACH, TENSACH, GIA, HINHANH
            FROM sach
            WHERE MASACH = $id
            LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $sp = mysqli_fetch_assoc($result);

        $cart[$sp['MASACH']] = [
            'ten'      => $sp['TENSACH'],
            'gia'      => (float)$sp['GIA'],
            'soluong'  => 1,
            'hinhanh'  => $sp['HINHANH']
        ];

        $total = (float)$sp['GIA'];

        // QUAN TRỌNG: lưu vào session để xuly_thanhtoan.php xử lý được
        $_SESSION['cart'] = $cart;
    }
}
// Đi từ giỏ hàng
elseif (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    foreach ($cart as $item) {
        $gia = (float)($item['gia'] ?? $item['price'] ?? 0);
        $soluong = (int)($item['soluong'] ?? $item['quantity'] ?? 1);
        $total += $gia * $soluong;
    }
}

// Xử lý mã giảm giá
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_voucher'])) {
    $ma_voucher = trim($_POST['voucher_code'] ?? '');

    if ($ma_voucher !== '') {
        $ma_voucher_safe = mysqli_real_escape_string($conn, $ma_voucher);

        $sql_voucher = "SELECT * FROM magiamgia
                        WHERE MA = '$ma_voucher_safe'
                        LIMIT 1";

        $result_voucher = mysqli_query($conn, $sql_voucher);

        if ($result_voucher && mysqli_num_rows($result_voucher) > 0) {
            $voucher = mysqli_fetch_assoc($result_voucher);
            $giamgia = isset($voucher['GIAMGIA']) ? (int)$voucher['GIAMGIA'] : 0;
            $thongbao_voucher = "Áp dụng mã giảm giá thành công.";
        } else {
            $thongbao_voucher = "Mã giảm giá không hợp lệ.";
        }
    } else {
        $thongbao_voucher = "Vui lòng nhập mã giảm giá.";
    }
}

$tong_sau_giam = max(0, $total - $giamgia);

require BASE_PATH . "/header.php";
?>

<div class="checkout-container">
    <h1 class="checkout-title">THANH TOÁN</h1>

    <?php if (empty($cart)): ?>
        <div class="checkout-empty">
            Giỏ hàng trống! <a href="<?= BASE_URL ?>/Sanpham.php">Quay lại mua sắm</a>
        </div>
    <?php else: ?>

    <form method="POST" action="">
        <div class="checkout-grid">

            <div class="checkout-card">
                <div class="checkout-card-header">
                    <h2>Thông tin người nhận</h2>
                </div>

                <div class="checkout-card-body">
                    <div class="form-group">
                        <label class="form-label">Họ và tên <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Số điện thoại <span style="color:red">*</span></label>
                        <input type="tel" class="form-control" name="phone" pattern="[0-9]{9,11}" title="Số điện thoại 9-11 số" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Địa chỉ nhận hàng <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="address" required placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ghi chú</label>
                        <textarea class="form-control" name="note" rows="4" placeholder="Ví dụ: Gọi trước khi giao hàng..."></textarea>
                    </div>

                    <h3 class="section-title">Phương thức thanh toán</h3>

                    <div class="payment-methods">
                        <div class="payment-option">
                            <label>
                                <input type="radio" name="payment_method" value="cod" checked required>
                                Thanh toán khi nhận hàng (COD)
                            </label>
                        </div>

                        <div class="payment-option disabled">
                            <label>
                                <input type="radio" name="payment_method" value="bank_transfer" disabled>
                                Chuyển khoản ngân hàng (đang bảo trì)
                            </label>
                        </div>

                        <div class="payment-option disabled">
                            <label>
                                <input type="radio" name="payment_method" value="momo" disabled>
                                Ví MoMo / ZaloPay (đang bảo trì)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-card">
                <div class="summary-header">
                    <h3>Tóm tắt đơn hàng</h3>
                </div>

                <div class="checkout-card-body">
                    <div class="order-items">
                        <?php foreach ($cart as $id => $item): ?>
                            <?php
                                $ten = $item['ten'] ?? $item['name'] ?? 'Sản phẩm';
                                $gia = (float)($item['gia'] ?? $item['price'] ?? 0);
                                $soluong = (int)($item['soluong'] ?? $item['quantity'] ?? 1);
                                $hinhanh = $item['hinhanh'] ?? $item['image'] ?? 'default-book.jpg';

                                $img = !empty($hinhanh) ? basename($hinhanh) : 'default-book.jpg';
                                $imgPath = BASE_URL . '/assets/images/' . rawurlencode($img);
                            ?>
                            <div class="order-item">
                                <div class="order-item-left">
                                    <img src="<?= $imgPath ?>"
                                         alt="<?= htmlspecialchars($ten) ?>"
                                         onerror="this.onerror=null;this.src='<?= BASE_URL ?>/assets/images/default-book.jpg';">

                                    <div>
                                        <div class="order-item-name"><?= htmlspecialchars($ten) ?></div>
                                        <div class="order-item-qty">Số lượng: × <?= $soluong ?></div>
                                    </div>
                                </div>

                                <div class="order-item-price">
                                    <?= number_format($gia * $soluong, 0, ',', '.') ?> ₫
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="voucher-box">
                        <input type="text" name="voucher_code" class="voucher-input"
                               placeholder="Nhập mã giảm giá"
                               value="<?= htmlspecialchars($ma_voucher) ?>">
                        <button type="submit" name="apply_voucher" class="voucher-btn">Áp dụng</button>
                    </div>

                    <?php if ($thongbao_voucher !== ''): ?>
                        <p class="voucher-message" style="margin:10px 0; font-weight:600; color: <?= ($giamgia > 0 ? 'green' : 'red') ?>;">
                            <?= htmlspecialchars($thongbao_voucher) ?>
                        </p>
                    <?php endif; ?>

                    <div class="summary-row">
                        <span>Tạm tính</span>
                        <span><?= number_format($total, 0, ',', '.') ?> ₫</span>
                    </div>

                    <div class="summary-row">
                        <span>Giảm giá</span>
                        <span style="color:#dc2626; font-weight:700;">
                            -<?= number_format($giamgia, 0, ',', '.') ?> ₫
                        </span>
                    </div>

                    <div class="summary-row">
                        <span>Phí vận chuyển</span>
                        <span style="color: green; font-weight: 700;">Miễn phí</span>
                    </div>

                    <div class="summary-total">
                        <span>Tổng tiền</span>
                        <span class="total-price"><?= number_format($tong_sau_giam, 0, ',', '.') ?> ₫</span>
                    </div>

                    <input type="hidden" name="total_amount" value="<?= $tong_sau_giam ?>">
                    <input type="hidden" name="discount_amount" value="<?= $giamgia ?>">
                    <input type="hidden" name="voucher_applied" value="<?= htmlspecialchars($ma_voucher) ?>">

                    <button type="submit"
                            name="confirm_order"
                            formaction="<?= BASE_URL ?>/xuly_thanhtoan.php"
                            class="btn-submit">
                        XÁC NHẬN ĐẶT HÀNG
                    </button>

                    <p class="checkout-note">
                        Khi nhấn "XÁC NHẬN ĐẶT HÀNG", bạn đồng ý với
                        <a href="#">Điều khoản dịch vụ</a>
                    </p>
                </div>
            </div>

        </div>
    </form>

    <?php endif; ?>
</div>

<?php require BASE_PATH . "/footer.php"; ?>