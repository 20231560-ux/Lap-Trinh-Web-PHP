<?php
require __DIR__.'/../../config/bootstrap.php';
require __DIR__.'/../models/Product.php';

$product = new Product($pdo);

$action = $_GET['action'] ?? 'index';

$limit = 5;
$page = max(1, intval($_GET['page'] ?? 1));

$total = $product->countAll();
$totalPages = max(1, ceil($total / $limit)); // không cho = 0

$page = min($page, $totalPages);
$offset = max(0, ($page - 1) * $limit); // không cho OFFSET âm


function upload_image() {
  if (empty($_FILES['image']['name'])) return null;

  $allow = ['jpg','jpeg','png','webp'];
  $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

  if (!in_array($ext, $allow)) {
    set_flash('error', 'File không hợp lệ');
    return null;
  }

  if ($_FILES['image']['size'] > 2*1024*1024) {
    set_flash('error', 'File quá 2MB');
    return null;
  }

  $name = uniqid().'.'.$ext;
  $uploadDir = realpath(__DIR__ . '/../../public/uploads');
move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . '/' . $name);

  return $name;
}

if ($action == 'index') {
  $products = $product->getPage($limit, $offset);
  include __DIR__.'/../views/products/index.php';
  exit;
}

if ($action == 'create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $img = upload_image();
  $product->create([
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'image' => $img
  ]);
  set_flash('success', 'Thêm thành công');
  header("Location: index.php?page=$page");
  exit;
}

if ($action == 'delete') {
  $product->delete($_GET['id']);
  set_flash('success', 'Xóa thành công');
  header("Location: index.php?page=$page");
  exit;
}
