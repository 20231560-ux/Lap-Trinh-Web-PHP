<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sinh viên</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Quản lý sinh viên</h2>

<form id="studentForm">
    Mã SV: <input name="code" required><br><br>
    Họ tên: <input name="full_name" required><br><br>
    Email: <input name="email" required><br><br>
    Ngày sinh: <input type="date" name="dob"><br><br>

    <button type="submit">Lưu</button>
</form>

<hr>

<table id="studentTable" border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script src="/labs/lab09/public/assets/js/app.js"></script>

</body>
</html>
