<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

<h2>Edit Category</h2>

<?php if ($error): ?>
<p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    Name: 
    <input name="name" value="<?= htmlspecialchars($category['name']) ?>">
    <br><br>
    <button>Update</button>
</form>

<a href="index.php?c=category&a=index">Back</a>

</body>
</html>
