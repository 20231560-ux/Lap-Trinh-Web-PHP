<?php
require_once '../config/db.php';

$keyword = trim($_GET['keyword'] ?? '');

if ($keyword === '') {
  $stmt = $pdo->query("SELECT * FROM categories ORDER BY id DESC");
} else {
  $stmt = $pdo->prepare(
    "SELECT * FROM categories
     WHERE name LIKE :kw1 OR slug LIKE :kw2
     ORDER BY id DESC"
  );
  $search = "%$keyword%";
  $stmt->execute([
    ':kw1' => $search,
    ':kw2' => $search
  ]);
}

$rows = $stmt->fetchAll();

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Categories</title>
</head>
<body>

<h2>Category Manager</h2>

<?php if ($flash): ?>
<p style="color:green;"><?php echo $flash; ?></p>
<?php endif; ?>

<form>
  <input type="text" name="keyword" placeholder="Search name or slug"
    value="<?php echo htmlspecialchars($keyword); ?>">
  <button>Search</button>
  <a href="create.php">Add New</a>
</form>

<br>

<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Slug</th>
  <th>Status</th>
  <th>Actions</th>
</tr>

<?php foreach ($rows as $row): ?>
<tr>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo htmlspecialchars($row['name']); ?></td>
  <td><?php echo htmlspecialchars($row['slug']); ?></td>
  <td><?php echo $row['status'] ? 'Active' : 'Hidden'; ?></td>
  <td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Xóa thật không?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
