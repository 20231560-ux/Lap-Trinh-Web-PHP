<?php
require_once "Student.php";

$students = [];
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $raw = trim($_POST["data"] ?? "");
    $threshold = $_POST["threshold"] ?? "";
    $sortDesc = isset($_POST["sort"]);

    if ($raw === "") {
        $error = "Vui lòng nhập dữ liệu sinh viên";
    } else {
        $records = explode(";", $raw);

        foreach ($records as $rec) {
            $parts = explode("-", trim($rec));
            if (count($parts) !== 3) continue;

            [$id, $name, $gpaStr] = $parts;
            if (!is_numeric($gpaStr)) continue;

            $students[] = new Student($id, $name, (float)$gpaStr);
        }

        if (empty($students)) {
            $error = "Không có sinh viên hợp lệ";
        }

        if ($threshold !== "" && is_numeric($threshold)) {
            $students = array_filter(
                $students,
                fn($s) => $s->getGpa() >= (float)$threshold
            );
        }

        if ($sortDesc) {
            usort($students, fn($a, $b) => $b->getGpa() <=> $a->getGpa());
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bài 5 - Student Manager</title>
<style>
table { border-collapse: collapse; width: 80%; }
th, td { border: 1px solid #000; padding: 6px; text-align: center; }
</style>
</head>
<body>

<h2>BÀI 5 – STUDENT MANAGER</h2>

<form method="post">
<textarea name="data" rows="4" cols="80"
placeholder="SV001-An-3.2;SV002-Binh-2.6;SV003-Chi-3.5"><?= htmlspecialchars($_POST["data"] ?? "") ?></textarea>
<br><br>

Lọc GPA ≥ <input type="text" name="threshold" value="<?= htmlspecialchars($_POST["threshold"] ?? "") ?>">
<label>
    <input type="checkbox" name="sort" <?= isset($_POST["sort"]) ? "checked" : "" ?>>
    Sort GPA giảm dần
</label>
<br><br>

<button type="submit">Parse & Show</button>
</form>

<?php if ($error): ?>
<p style="color:red;"><b><?= $error ?></b></p>
<?php endif; ?>

<?php if (!empty($students)): ?>

<table>
<tr>
    <th>STT</th>
    <th>Mã SV</th>
    <th>Tên</th>
    <th>GPA</th>
    <th>Xếp loại</th>
</tr>

<?php
$total = 0;
$gpas = [];
$rankCount = ["Giỏi"=>0, "Khá"=>0, "Trung bình"=>0];
?>

<?php foreach ($students as $i => $sv): ?>
<?php
    $total += $sv->getGpa();
    $gpas[] = $sv->getGpa();
    $rankCount[$sv->rank()]++;
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

<p><b>GPA trung bình:</b> <?= number_format($total / count($students), 2) ?></p>
<p><b>GPA cao nhất:</b> <?= max($gpas) ?></p>
<p><b>GPA thấp nhất:</b> <?= min($gpas) ?></p>
<p><b>Giỏi:</b> <?= $rankCount["Giỏi"] ?> |
<b>Khá:</b> <?= $rankCount["Khá"] ?> |
<b>Trung bình:</b> <?= $rankCount["Trung bình"] ?></p>

<?php endif; ?>

</body>
</html>
