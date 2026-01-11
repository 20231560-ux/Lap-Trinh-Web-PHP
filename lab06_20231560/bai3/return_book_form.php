<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trả sách</title>
</head>
<body>

<h2>Trả sách</h2>

<form method="post" action="return_process.php">
    Mã phiếu mượn: <input type="text" name="borrow_id"><br><br>
    Ngày trả: <input type="date" name="return_date"><br><br>

    <button type="submit">Trả sách</button>
</form>

<br>
<a href="borrow_form.php">Quay lại mượn sách</a>

</body>
</html>
