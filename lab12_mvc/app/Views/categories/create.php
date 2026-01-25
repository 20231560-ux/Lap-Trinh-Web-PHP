<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

<h2>Add Category</h2>

<?php if ($error): ?>
<p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    Name: <input name="name">
    <br><br>
    <button>Save</button>
</form>

<a href="index.php?c=category&a=index">Back</a>

</body>
</html>
