<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>

<h2>Category List</h2>

<form method="get">
    <input type="hidden" name="c" value="category">
    <input type="hidden" name="a" value="index">
    <input name="q" placeholder="Search name..." value="<?= htmlspecialchars($q) ?>">
    <button>Search</button>
</form>

<br>

<a href="index.php?c=category&a=create">+ Add Category</a>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
</tr>

<?php foreach ($categories as $c): ?>
<tr>
    <td><?= $c['id'] ?></td>
    <td><?= htmlspecialchars($c['name']) ?></td>
    <td>
        <a href="index.php?c=category&a=edit&id=<?= $c['id'] ?>">Edit</a>
        |
        <a onclick="return confirm('Delete this category?')" 
           href="index.php?c=category&a=delete&id=<?= $c['id'] ?>">
           Delete
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
