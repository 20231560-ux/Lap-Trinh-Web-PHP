<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Không truy cập trực tiếp!";
    exit;
}

$borrow_id  = trim($_POST['borrow_id'] ?? '');
$return_date = trim($_POST['return_date'] ?? '');

if ($borrow_id === '' || $return_date === '') {
    echo "Thiếu dữ liệu! <a href='return_book_form.php'>Quay lại</a>";
    exit;
}

$borrowsPath = "../data/borrows.json";
$booksPath   = "../data/books.json";

$borrows = json_decode(file_get_contents($borrowsPath), true);
$books   = json_decode(file_get_contents($booksPath), true);

$found = false;

foreach ($borrows as &$b) {
    if ($b['borrow_id'] === $borrow_id && $b['status'] === 'Đang mượn') {
        $b['status'] = 'Đã trả';
        $b['actual_return'] = $return_date;

        // tăng số lượng sách
        foreach ($books as &$bk) {
            if ($bk['code'] === $b['book_code']) {
                $bk['quantity']++;
                break;
            }
        }

        $found = true;
        break;
    }
}

if (!$found) {
    echo "Phiếu không tồn tại hoặc đã trả! <a href='return_book_form.php'>Quay lại</a>";
    exit;
}

// lưu lại file
file_put_contents($borrowsPath, json_encode($borrows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents($booksPath, json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo "<h2>Trả sách thành công ✅</h2>";
echo "<a href='borrow_form.php'>Mượn sách tiếp</a>";
