<?php
// Không cho truy cập trực tiếp
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Không truy cập trực tiếp! <a href='borrow_form.php'>Quay lại</a>";
    exit;
}

// Nhận dữ liệu
$member_id   = trim($_POST['member_id'] ?? '');
$book_code   = trim($_POST['book_code'] ?? '');
$borrow_date = trim($_POST['borrow_date'] ?? '');
$days        = intval($_POST['days'] ?? 0);

$errors = [];

// ===== VALIDATE =====
if ($member_id === '')   $errors[] = "Thiếu mã thành viên";
if ($book_code === '')   $errors[] = "Thiếu mã sách";
if ($borrow_date === '') $errors[] = "Thiếu ngày mượn";
if ($days < 1 || $days > 30) $errors[] = "Số ngày mượn phải từ 1 đến 30";

// ===== KIỂM TRA THÀNH VIÊN =====
$membersPath = "../data/members.csv";
$members = array_map('str_getcsv', file($membersPath));

$foundMember = false;
foreach ($members as $m) {
    if (($m[0] ?? '') === $member_id) {
        $foundMember = true;
        break;
    }
}
if (!$foundMember) {
    $errors[] = "Mã thành viên không tồn tại";
}

// ===== KIỂM TRA SÁCH =====
$booksPath = "../data/books.json";
$books = json_decode(file_get_contents($booksPath), true);

$bookIndex = -1;
foreach ($books as $i => $b) {
    if ($b['code'] === $book_code) {
        $bookIndex = $i;
        if ($b['quantity'] <= 0) {
            $errors[] = "Sách đã hết";
        }
        break;
    }
}
if ($bookIndex === -1) {
    $errors[] = "Mã sách không tồn tại";
}

// ===== NẾU CÓ LỖI =====
if (!empty($errors)) {
    echo "<h3>Lỗi:</h3><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><a href='borrow_form.php'>Quay lại</a>";
    exit;
}

// ===== GHI PHIẾU MƯỢN =====
$borrowsPath = "../data/borrows.json";
$borrows = json_decode(file_get_contents($borrowsPath), true);

$borrow_id = "PM" . time();
$return_date = date('Y-m-d', strtotime("$borrow_date +$days days"));

$borrows[] = [
    'borrow_id'   => $borrow_id,
    'member_id'   => $member_id,
    'book_code'   => $book_code,
    'borrow_date'=> $borrow_date,
    'return_date'=> $return_date,
    'status'      => 'Đang mượn'
];

// Giảm số lượng sách
$books[$bookIndex]['quantity']--;

// Lưu file
file_put_contents($borrowsPath, json_encode($borrows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents($booksPath, json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ===== KẾT QUẢ =====
echo "<h2>Mượn sách thành công 🎉</h2>";
echo "<p>Mã phiếu: <b>$borrow_id</b></p>";
echo "<p>Hạn trả: <b>$return_date</b></p>";
echo "<a href='borrow_form.php'>Mượn tiếp</a> | ";
echo "<a href='return_book_form.php'>Trả sách</a>";
