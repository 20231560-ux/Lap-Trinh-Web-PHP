<?php
require_once '../config/db.php';

$errors = [];
$name = $slug = $description = '';
$status = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $slug = trim($_POST['slug']);
  $description = trim($_POST['description']);
  $status = $_POST['status'] ?? 1;

  if ($name === '' || mb_strlen($name) < 3) {
    $errors['name'] = 'Name phải từ 3 ký tự';
  }

  if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
    $errors['slug'] = 'Slug chỉ gồm a-z, 0-9 và -';
  }

  $check = $pdo->prepare("SELECT id FROM categories WHERE slug = ?");
  $check->execute([$slug]);
  if ($check->fetch()) {
    $errors['slug'] = 'Slug đã tồn tại';
  }

  if (!$errors) {
    $stmt = $pdo->prepare(
      "INSERT INTO categories(name, slug, description, status)
       VALUES(?,?,?,?)"
    );
    $stmt->execute([$name, $slug, $description, $status]);

    $_SESSION['flash'] = 'Thêm thành công!';
    header('Location: index.php');
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add</title>
</head>
<body>

<h2>Add Category</h2>

<form method="post">
  <p>
    Name:<br>
    <input name="name" value="<?php echo htmlspecialchars($name); ?>"><br>
    <span style="color:red;"><?php echo $errors['name'] ?? ''; ?></span>
  </p>

  <p>
    Slug:<br>
    <input name="slug" value="<?php echo htmlspecialchars($slug); ?>"><br>
    <span style="color:red;"><?php echo $errors['slug'] ?? ''; ?></span>
  </p>

  <p>
    Description:<br>
    <textarea name="description"><?php echo htmlspecialchars($description); ?></textarea>
  </p>

  <p>
    Status:
    <select name="status">
      <option value="1">Active</option>
      <option value="0">Hidden</option>
    </select>
  </p>

  <button>Save</button>
  <a href="index.php">Back</a>
</form>

</body>
</html>
