<?php
require_once "Student.php";

$students = [
    new Student("SV001", "An", 3.2),
    new Student("SV002", "Bình", 2.6),
    new Student("SV003", "Chi", 3.5),
    new Student("SV004", "Dũng", 2.0),
    new Student("SV005", "Hà", 3.8)
];

$totalGpa = 0;
$countRank = ["Giỏi" => 0, "Khá" => 0, "Trung bình" => 0];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bài 4 - Student</title>
<style>
table { border-collapse: collapse; width: 70%; }
th, td { border: 1px solid #000; padding: 6px; text-align: center; }
</style>
</head>
<body>

<h2>BÀI 4 – DANH SÁCH SINH VIÊN</h2>

<table>
<tr>
    <th>STT</th>
    <th>Mã SV</th>
    <th>Tên</th>
    <th>GPA</th>
    <th>Xếp loại</th>
</tr>

<?php foreach ($students as $i => $sv): ?>
<?php
    $totalGpa += $sv->getGpa();
    $countRank[$sv->rank()]++;
?>
<tr>
    <td><?= $i + 1 ?></td>
    <td><?= htmlspecialchars($sv->getId()) ?></td>
    <td><?= htmlspecialchars($sv->getName()) ?></td>
    <td><?= $sv->getGpa() ?></td>
    <td><?= $sv->rank() ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php $avg = $totalGpa / count($students); ?>

<p><b>GPA trung bình lớp:</b> <?= number_format($avg, 2) ?></p>
<p><b>Số SV Giỏi:</b> <?= $countRank["Giỏi"] ?></p>
<p><b>Số SV Khá:</b> <?= $countRank["Khá"] ?></p>
<p><b>Số SV Trung bình:</b> <?= $countRank["Trung bình"] ?></p>

</body>
</html>
