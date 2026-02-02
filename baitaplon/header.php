<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Website PHP</title>

    <!-- CSS chung -->
    <link rel="stylesheet" href="css/style.css">

    <!-- CSS riêng từng trang -->
    <?php
    if (isset($page_css)) {
        echo '<link rel="stylesheet" href="css/' . $page_css . '">';
    }
    ?>

</head>
<body>
