<?php
require_once '../config/db.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) {
  die('Not found');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $slug = trim($_POST['slug']);
  $description = trim($_POST['description']);
  $status = $_POST['status'];

  if ($name === '' || mb_strlen($name) < 3) {
    $errors['name'] = 'Name phải từ 3 ký tự';
  }

  $check = $pdo->prepare(
    "SELECT id FROM categories WHERE slug = ? AND id != ?"
  );
  $check->execute([$slug, $id]);
  if ($check->fetch()) {
    $errors['slug'] = 'Slug đã tồn tại';
  }

  if (!$errors) {
    $stmt = $pdo->prepare(
      "UPDATE categories
       SET name=?, slug=?, description=?, status=?
       WHERE id=?"
    );
    $stmt->execute([$name, $slug, $description, $status, $id]);

    $_SESSION['flash'] = 'Cập nhật thành công!';
    header('Location: index.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit</title>
</head>
<body>

<h2>Edit Category</h2>

<form method="post">
  <p>
    Name:<br>
    <input name="name" value="<?php echo htmlspecialchars($data['name']); ?>"><br>
    <span style="color:red;"><?php echo $errors['name'] ?? ''; ?></span>
  </p>

  <p>
    Slug:<br>
    <input name="slug" value="<?php echo htmlspecialchars($data['slug']); ?>"><br>
    <span style="color:red;"><?php echo $errors['slug'] ?? ''; ?></span>
  </p>

  <p>
    Description:<br>
    <textarea name="description"><?php echo htmlspecialchars($data['description']); ?></textarea>
  </p>

  <p>
    Status:
    <select name="status">
      <option value="1" <?php if ($data['status']) echo 'selected'; ?>>Active</option>
      <option value="0" <?php if (!$data['status']) echo 'selected'; ?>>Hidden</option>
    </select>
  </p>

  <button>Update</button>
  <a href="index.php">Back</a>
</form>

</body>
</html>
