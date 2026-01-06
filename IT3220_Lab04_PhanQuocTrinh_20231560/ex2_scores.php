<?php
$scores = [8.5, 7.0, 9.25, 6.5, 8.0, 5.75];

$avg = array_sum($scores) / count($scores);

$goodScores = array_filter($scores, fn($s) => $s >= 8.0);

$max = max($scores);
$min = min($scores);

$asc = $scores;
$desc = $scores;
sort($asc);
rsort($desc);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Mảng điểm</title>
</head>
<body>

<h2>BÀI 2 – MẢNG ĐIỂM</h2>

<p><b>Điểm trung bình:</b> <?= number_format($avg, 2) ?></p>
<p><b>Số điểm ≥ 8.0:</b> <?= count($goodScores) ?></p>
<p><b>Danh sách điểm ≥ 8.0:</b> <?= implode(", ", $goodScores) ?></p>
<p><b>Max:</b> <?= $max ?> | <b>Min:</b> <?= $min ?></p>

<p><b>Tăng dần:</b> <?= implode(", ", $asc) ?></p>
<p><b>Giảm dần:</b> <?= implode(", ", $desc) ?></p>

</body>
</html>
