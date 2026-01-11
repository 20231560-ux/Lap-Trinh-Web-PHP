<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Phiếu mượn sách</title>
</head>
<body>

<h2>Lập phiếu mượn sách</h2>

<form method="post" action="borrow_process.php">
    Mã thành viên: <input type="text" name="member_id"><br><br>
    Mã sách: <input type="text" name="book_code"><br><br>
    Ngày mượn: <input type="date" name="borrow_date"><br><br>
    Số ngày mượn (1–30): 
    <input type="number" name="days" min="1" max="30"><br><br>

    <button type="submit">Mượn sách</button>
</form>

</body>
</html>
